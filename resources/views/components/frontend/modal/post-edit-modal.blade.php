@props(['post'])

<div class="flex flex-1 items-start space-x-4 p-5">
    @if(auth()->user()?->getMedia('avatar')->count() === 0)
        <img src="{{ asset('avatar.webp')}}" class="bg-gray-200 border border-white rounded-full w-11 h-11"
             alt="{{ auth()->user()->name }}">
    @else
        <img src="{{ auth()->user()?->getFirstMediaUrl('avatar') }}"
             class="bg-gray-200 border border-white rounded-full w-11 h-11" alt="{{ auth()->user()?->name }}">
    @endif
    <div class="flex-1 pt-2">
                    <textarea
                        class="uk-textarea text-black shadow-none focus:shadow-none text-xl font-medium resize-none"
                        rows="5"
                        name="title"
                        value="{{ $post->title }}"
                        placeholder="{{ $post->title }}"></textarea>
    </div>

</div>

{{ $slot }}

<div class="flex items-center w-full justify-between border-t p-3">


    <div class="flex space-x-2">
        <button type="submit"
                class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
            Save
        </button>
    </div>

    <a href="#" hidden
       class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold">
        Save </a>
</div>
