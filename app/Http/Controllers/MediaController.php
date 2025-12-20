<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $mediaService;

    public function __construct(\App\Services\MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function index()
    {
        $media = auth()->user()->media()->latest()->paginate(20);

        $stats = [
            'documents' => \App\Models\Media::whereIn('mime_type', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'])->count(),
            'images' => \App\Models\Media::where('mime_type', 'like', 'image/%')->count(),
            'videos' => \App\Models\Media::where('mime_type', 'like', 'video/%')->count(),
            'others' => \App\Models\Media::where('mime_type', 'not like', 'image/%')
                ->where('mime_type', 'not like', 'video/%')
                ->whereNotIn('mime_type', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'])
                ->count(),
        ];

        return view('media.index', compact('media', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'nullable|file|image|max:5120', // 5MB
            'url' => 'nullable|url',
        ]);

        try {
            if ($request->hasFile('file')) {
                $media = $this->mediaService->upload($request->file('file'));
            } elseif ($request->filled('url')) {
                $media = $this->mediaService->importFromUrl($request->input('url'));
            } else {
                return response()->json(['message' => 'No file or URL provided.'], 422);
            }

            return response()->json([
                'message' => 'Media uploaded successfully.',
                'media' => $media,
                'url' => $media->url,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
