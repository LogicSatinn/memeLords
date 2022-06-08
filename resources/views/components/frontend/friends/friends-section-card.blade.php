@props(['user'])

<li>
    <a href="{{ route('profile.show', $user) }}" class="uk-link-reset">
        <div class="card">
{{--            <img src="assets/images/avatars/avatar-6.jpg" class="h-44 object-cover rounded-t-md shadow-sm w-full">--}}
            @if($user->getMedia('avatar')->count() === 0)
                <img src="{{ asset('avatar.webp')}}"
                     class="h-44 object-cover rounded-t-md shadow-sm w-full" alt="{{ $user->name }}">
            @else
                <img src="{{ asset($user->getFirstMediaUrl('avatar'))}}"
                     class="h-44 object-cover rounded-t-md shadow-sm w-full" alt="{{ $user->name }}">
            @endif
            <div class="p-4">
                <h4 class="text-base font-semibold mb-1"> James Lewis </h4>
{{--                <p class="font-medium text-sm">843K Following </p>--}}
            </div>
        </div>
    </a>
</li>
