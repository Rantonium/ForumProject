@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex bg-gray-500 items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 transition'
: 'inline-flex items-center bg-gray-400 rounded text-xs px-2 pt-1 border-b-2 border-transparent font-medium leading-5 text-black-500 hover:bg-gray-200 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }} </a>
