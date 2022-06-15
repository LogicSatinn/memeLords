@props(['post', 'user'])

<div>
    <h1 class="text-2xl font-semibold line-clamp-1"> {{ $post->title }} </h1>
</div>

<div class="md:flex items-center justify-between">
    <a href="#" class="flex items-center space-x-3">
        @if($user->getMedia('avatar')->count() === 0)
            <img src="{{ asset('avatar.webp')}}"
                 class="w-10 rounded-full" alt="{{ $user->name }}">
        @else
            <img src="{{ asset($user->getFirstMediaUrl('avatar'))}}"
                 class="w-10 rounded-full" alt="{{ $user->name }}">
        @endif
        <div class="m-2">
            <div class="text-base font-semibold"> {{ $post->user->username }} </div>
            <div class="text-xs"> Posted on {{ $post->created_at->format('M d, Y') }} </div>
        </div>
    </a>
    <div class="flex items-center mt-3 space-x-3 md:pt-0 pt-2">
        <div class="flex overflow-hidden">
            Likes
        </div>
        <div class="like-btn" uk-tooltip="I like it">
            <i class="uil-thumbs-up"></i>
            <span class="likes">{{ $post->likersCount() }}</span>
        </div>
    </div>
</div>
