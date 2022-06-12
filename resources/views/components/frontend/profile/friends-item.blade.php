@props(['user'])

<div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
    <a href="{{ route('profile.show', $user) }}" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
        @if($user->getMedia('avatar')->count() === 0)
            <img src="{{ asset('avatar.webp')}}"
                 class="absolute w-full h-full inset-0 " alt="{{ $user->name }}">
        @else
            <img src="{{ asset($user->getFirstMediaUrl('avatar'))}}"
                 class="absolute w-full h-full inset-0 " alt="{{ $user->name }}">
        @endif
    </a>
    <div class="flex-1">
        <a href="{{ route('profile.show', $user) }}" class="text-base font-semibold capitalize"> {{ $user->name }} </a>
    </div>

    @unless(! auth()->user()->isFriendWith($user))
    <a href="{{ route('unfriendUser', $user) }}"
       class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-blue-500 text-white">
        Unfriend
    </a>
        @endunless
</div>
