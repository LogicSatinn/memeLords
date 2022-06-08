@props(['category'])

<li>
    <div class="rounded-md overflow-hidden relative w-full h-36">
        <div
            class="absolute w-full h-3/4 -bottom-12 bg-gradient-to-b from-transparent to-gray-800 z-10">
        </div>
        @if($category->getMedia('categories')->count() === 0)
            <img src="{{ asset('avatar.webp')}}"
                 class="absolute w-full h-full object-cover" alt="{{ $category->name }}">
        @else
            <img src="{{ asset($category->getFirstMediaUrl('categories'))}}"
                 class="absolute w-full h-full object-cover" alt="{{ $category->name }}">
        @endif
        <div class="absolute bottom-0 w-full p-3 text-white z-20 font-semibold text-lg"> {{ $category->name }}
        </div>
    </div>
</li>
