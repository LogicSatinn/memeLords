@props(['comment'])

<div class="flex gap-x-4 relative rounded-md">
    @if($comment->commentator->getMedia('avatar')->count() === 0)
        <img src="{{ asset('avatar.webp')}}"
             class="rounded-full shadow w-12 h-12" alt="{{ $comment->commentator->name }}">
    @else
        <img src="{{ asset($comment->commentator->getFirstMediaUrl('avatar'))}}"
             class="rounded-full shadow w-12 h-12" alt="{{ $comment->commentator->name }}">
    @endif
    <div>
        <h5 class="text-base m-0 font-medium">{{ $comment->commentator->username }}</h5>
        <span class="text-gray-700 text-xs"> {{ $comment->updated_at->format('d, M Y') }} </span>
        <p class="mt-3 md:ml-0 -ml-16">
            {{ $comment->comment }}
        </p>
    </div>
</div>
