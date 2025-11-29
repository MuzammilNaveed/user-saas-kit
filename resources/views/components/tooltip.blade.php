@props(['text'])

<div x-data="{ tooltip: false }" class="relative inline-block">
    <div @mouseenter="tooltip = true" @mouseleave="tooltip = false" class="inline-flex">
        {{ $slot }}
    </div>
    <div x-show="tooltip" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="absolute z-10 bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-1 text-xs font-medium text-white bg-gray-900 rounded-md shadow-sm whitespace-nowrap pointer-events-none"
        style="display: none;">
        {{ $text }}
    </div>
</div>
