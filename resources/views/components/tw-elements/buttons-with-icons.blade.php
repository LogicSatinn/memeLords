<a
    {{ $attributes->class(['inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1'])
->merge(['type' => 'button', 'data-mdb-ripple' => 'true', 'data-mdb-ripple-color' => 'light']) }}
>
    <!-- Twitter -->
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        class="w-4 h-4">
        {{ $slot }}
        </svg>
</a>
