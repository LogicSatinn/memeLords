<li>
    <a {{ $attributes->merge(['class' => 'flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800']) }}>
        {{ $slot }}
    </a>
</li>
