@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-200 font-semibold pl-12 py-2 md:py-4 focus:outline-none w-full']) !!}>
