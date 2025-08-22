<div>
@props([
    'title',
    'route' => null,     // For single link (e.g., dashboard)
    'routes' => [],      // For dropdown (e.g., user/roles management)
    'dropdownId' => 'dropdown-' . Str::slug($title),
    'icon' => null,
])

@php
    $isActive = false;

    if ($route) {
        $isActive = request()->url() === $route;
    } elseif ($routes) {
        foreach ($routes as $pattern) {
            if (request()->is($pattern)) {
                $isActive = true;
                break;
            }
        }
    }
@endphp

@if ($route)
    {{-- 🔗 Single Link --}}
    <li>
        <a href="{{ $route }}"
            class="flex items-center p-2 text-base font-normal rounded-lg transition duration-75 group
            {{ $isActive ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            {!! $icon !!}
            <span class="ml-3">{{ $title }}</span>
        </a>
    </li>
@elseif ($routes)
    {{-- 🔽 Dropdown --}}
    <li>
        <button type="button"
            class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="{{ $dropdownId }}"
            data-collapse-toggle="{{ $dropdownId }}"
            @if ($isActive) aria-expanded="true" @endif>
            {!! $icon !!}
            <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $title }}</span>
            <svg class="w-6 h-6 transition-transform duration-300 {{ $isActive ? 'rotate-180' : '' }}"
                fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L10 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <ul id="{{ $dropdownId }}" class="{{ $isActive ? '' : 'hidden' }} py-2 space-y-2">
            {{ $slot }}
        </ul>
    </li>
@endif

</div>