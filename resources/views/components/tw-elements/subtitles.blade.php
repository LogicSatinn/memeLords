@props(['info', 'action'])

<p class="text-sm font-semibold mt-2 pt-1 mb-4">
{{--    Already Registered?--}}
    {{ $info }}
    <a
        {{ $attributes->class(['text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out']) }}
    >{{ $action }}</a>
</p>
