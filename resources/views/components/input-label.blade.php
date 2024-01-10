@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-3 text-gray-700 block font-medium  text-black dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
