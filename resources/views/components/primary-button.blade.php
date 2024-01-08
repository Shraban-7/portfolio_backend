<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gradient-to-b from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white uppercase w-full']) }}>
    {{ $slot }}
</button>
