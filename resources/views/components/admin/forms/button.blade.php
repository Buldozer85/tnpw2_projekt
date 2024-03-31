@props([
    'route' => '#',
    'type' => 'short'
])

@if($route === '#')
    <button type="submit" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 @if($type === 'long') w-full @endif">{{ $slot }}</button>
@else
    <a href="{{ $route }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">{{ $slot }}</a>
@endif
