<a
    {{ $attributes->class(['px-7 py-3 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full flex justify-center items-center mb-3'])->merge([ 'role' => 'button', 'data-mdb-ripple' => 'true', 'data-mdb-ripple-color' => 'light']) }}
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        class="w-3.5 h-3.5 mr-2">
        {{ $path }}
    </svg>
    {{ $button }}
</a>
