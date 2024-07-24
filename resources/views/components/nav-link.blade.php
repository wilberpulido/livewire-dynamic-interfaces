@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex uppercase items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-blue-600 text-sm text-gray-900 dark:text-white/90 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex uppercase items-center px-1 pt-1 border-b-2 border-transparent text-sm text-gray-500 dark:text-gray-600 hover:text-gray-700 dark:hover:text-white hover:border-gray-300 dark:hover:border-blue-600 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
