@props(['user'])

<li>
    <div class="card">
        <a href="{{ route('profile.show', $user) }}">
            @if($user->getMedia('avatar')->count() === 0)
                <img src="{{ asset('avatar.webp')}}"
                     class="h-44 object-cover rounded-t-md shadow-sm w-full" alt="{{ $user->name }}">
            @else
                <img src="{{ asset($user->getFirstMediaUrl('avatar'))}}"
                     class="h-44 object-cover rounded-t-md shadow-sm w-full" alt="{{ $user->name }}">
            @endif
        </a>
        <div class="p-3">
            <a href="{{ route('profile.show', $user) }}">
                <h4 class="text-base font-semibold mb-0.5"> {{ $user->name }} </h4>
                <p class="font-medium text-sm">{{ $user->username }}</p>
            </a>
            <a href="{{ route('unfriendUser', $user) }}" class="block py-1.5 mt-2 text-sm font-semibold text-center bg-gray-200 rounded-md">Unfriend</a>
        </div>
    </div>
</li>

