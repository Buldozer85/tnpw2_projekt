@props([
    'route' => '#',
    'isCurrent' => false
])
<li>
    <a href="{{ $route }}" class="@if($isCurrent) !bg-gray-800 !text-white @endif text-gray-400 hover:text-white hover:bg-gray-800 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            @isset($icon)
                {{ $icon }}
            @endif
        </svg>
        {{ $slot }}
    </a>
</li>