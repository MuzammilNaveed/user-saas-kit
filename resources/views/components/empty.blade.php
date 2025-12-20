@props(['title', 'description', 'actionUrl' => null, 'actionLabel' => null])

<div
    class="w-full border border-dashed rounded-lg border-gray-300 flex flex-col items-center justify-center gap-4 min-h-[calc(100vh-7rem)]">
    <div class="bg-gray-100 p-3 rounded-full">
        <x-lucide-folder-code class="w-5 h-5 text-gray-600" />
    </div>
    <div class="text-center space-y-1">
        <h3 class="text-base font-semibold">{{ $title }}</h3>
        <p class="text-[#737373] text-sm font-normal">{{ $description }}</p>
    </div>
    @if($actionUrl)
    <a href="{{ $actionUrl }}"
        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
        {{ $actionLabel }}
    </a>
    @endif
</div>