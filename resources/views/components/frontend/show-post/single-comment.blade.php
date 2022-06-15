@props(['comment'])

<div class="flex gap-x-4 mb-5 relative">
    @if($comment->commentator->getMedia('avatar')->count() === 0)
        <img src="{{ asset('avatar.webp')}}"
             class="rounded-full shadow w-12 h-12" alt="{{ $comment->commentator->name }}">
    @else
        <img src="{{ asset($comment->commentator->getFirstMediaUrl('avatar'))}}"
             class="rounded-full shadow w-12 h-12" alt="{{ $comment->commentator->name }}">
    @endif
    <div>
        <h4 class="text-base m-0 font-semibold"> {{ $comment->commentator->username }} </h4>
        <span class="text-gray-700 text-sm"> {{ $comment->created_at->format('jS M Y') }}</span>
        <p class="mt-3">
            {{ $comment->comment }}
        </p>

    </div>
</div>
