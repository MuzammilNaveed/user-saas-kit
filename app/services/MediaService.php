<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use InvalidArgumentException;

class MediaService
{
    /**
     * Upload a file and create a media record.
     *
     * @param UploadedFile $file
     * @param string $disk
     * @return Media
     */
    public function upload(UploadedFile $file, string $disk = 'public'): Media
    {
        $filename = $file->hashName();
        $path = $file->storeAs('uploads', $filename, $disk);

        $media = auth()->user()->media()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'disk' => $disk,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'type' => 'image', // Basic type assumption, can be improved
        ]);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($media)
            ->withProperties($media->toArray())
            ->log(auth()->user()->name . " uploaded a new media: " . $media->name);

        return $media;
    }

    /**
     * Import a file from a URL and create a media record.
     *
     * @param string $url
     * @param string $disk
     * @return Media
     */
    public function importFromUrl(string $url, string $disk = 'public'): Media
    {
        $response = Http::get($url);

        if (!$response->successful()) {
            throw new InvalidArgumentException("Unable to fetch file from URL.");
        }

        $content = $response->body();
        $mimeType = $response->header('Content-Type');
        $extension = $this->guessExtensionFromMimeType($mimeType);
        $filename = Str::random(40) . '.' . $extension;
        $path = 'uploads/' . $filename;

        Storage::disk($disk)->put($path, $content);

        $media = auth()->user()->media()->create([
            'name' => basename($url),
            'path' => $path,
            'disk' => $disk,
            'mime_type' => $mimeType,
            'size' => strlen($content),
            'type' => 'image',
            'orig_url' => $url,
        ]);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($media)
            ->withProperties($media->toArray())
            ->log(auth()->user()->name . " imported media from URL: " . $media->name);

        return $media;
    }

    /**
     * Guess extension from mime type.
     */
    protected function guessExtensionFromMimeType($mimeType)
    {
        $map = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'application/pdf' => 'pdf',
        ];

        return $map[$mimeType] ?? 'bin';
    }
}
