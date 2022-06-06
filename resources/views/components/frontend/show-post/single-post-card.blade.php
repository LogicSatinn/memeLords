@props(['post', 'user'])

<div class="card">

    <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
        <x-frontend.show-post.single-post-card-media/>
    </div>
    <div class="p-7">

        <h1 class="lg:text-3xl text-2xl font-semibold mb-6"> {{ $post->title }} </h1>

        <div class="flex items-center space-x-3 my-4 pb-4 border-b border-gray-100">
            @if($user->getMedia('avatar')->count() === 0)
                <img src="{{ asset('avatar.webp')}}"
                     class="w-10 rounded-full" alt="{{ $user->name }}">
            @else
                <img src="{{ asset($user->getFirstMediaUrl('avatar'))}}"
                     class="w-10 rounded-full" alt="{{ $user->name }}">
            @endif
            <div>
                <div class="text-base font-semibold"> {{ $user->username }}</div>
                <div class="text-xs"> Posted on {{ $post->created_at->format('M, d Y') }}</div>
            </div>
        </div>
    </div>

</div>
