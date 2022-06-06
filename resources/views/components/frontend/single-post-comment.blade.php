<div class="flex">
    <div class="w-10 h-10 rounded-full relative flex-shrink-0">
        @if($comment->commentator->getMedia('avatar')->count() === 0)
            <img src="{{ asset('avatar.webp')}}"
                 class="absolute h-full rounded-full w-full" alt="{{ $comment->commentator->name }}">
        @else
            <img src="{{ asset($comment->commentator->getFirstMediaUrl('avatar'))}}"
                 class="absolute h-full rounded-full w-full" alt="{{ $comment->commentator->name }}">
        @endif
    </div>
    <div>
        <div
            class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
            <p class="leading-6">{{ $comment->comment }}</p>
            <div
                class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
        </div>

    </div>
</div>
