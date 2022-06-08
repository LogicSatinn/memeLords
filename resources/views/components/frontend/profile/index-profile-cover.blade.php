@props(['user'])

<div class="profile user-profile">

    <div class="profiles_banner">
        <img src="{{ asset('assets/images/avatars/profile-cover.jpg')}}" alt="">

    </div>
    <div class="profiles_content">

        <div class="profile_avatar">
            <div class="profile_avatar_holder">
                @if($user->getMedia('avatar')->count() === 0)
                    <img src="{{ asset('avatar.webp')}}" alt="{{ $user->name }}">
                @else
                    <img src="{{ $user->getFirstMediaUrl('avatar') }}" alt="{{ $user->name }}">
                @endif
            </div>
            <div class="user_status status_online"></div>
            <div class="icon_change_photo" hidden>
                <ion-icon name="camera" class="text-xl"></ion-icon>
            </div>
        </div>

        <div class="profile_info">
            <h1 class="text-center"> {{ $user->name }} </h1>
            <p> Username: {{ $user->username }} &nbsp; Email: {{ $user->email }} </p>
        </div>

    </div>

    <div class="flex justify-between lg:border-t border-gray-100 flex-col-reverse lg:flex-row pt-2">
        <nav class="responsive-nav pl-3">
            <ul uk-switcher="connect: #timeline-tab; animation: uk-animation-fade">
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>

        <!-- button actions -->
        <div class="flex items-center space-x-1.5 flex-shrink-0 pr-4 mb-2 justify-center order-1 relative">

            @if(! $user->isFriendWith(auth()->user()) && $user !== auth()->user() && ! auth()->user()->hasSentFriendRequestTo($user))
            <!-- add story -->
            <a href="{{ route('sendFriendRequest', $user) }}"
               class="flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white"
               >
                <span> Send Friend Request </span>
            </a>
            @endif

        </div>

    </div>

</div>
