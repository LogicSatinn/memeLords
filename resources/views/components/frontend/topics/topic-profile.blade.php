@props(['topic', 'users'])

<div class="profile is_group">

    <div class="profiles_banner">
        <img src="{{ asset($topic->getFirstMediaUrl('topics')) }}" alt="{{ $topic->name }}">
    </div>
    <div class="profiles_content">

        <div class="profile_info">
            <h1> {{ $topic->name }} </h1>
            <p> {{ $topic->visibility }} · {{ $topic->users->count() }} memeLords</p>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-blue-600 text-white  space-x-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                          clip-rule="evenodd"></path>
                </svg>
                <span> Join </span>
            </a>
        </div>

    </div>

    <nav class="responsive-nav border-t -mb-0.5 lg:pl-3.5">
        <ul>
            <li class="active"><a href="#"> Home</a></li>
        </ul>
    </nav>

    <!-- search icon -->
    <a href="#" class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 z-10 absolute bottom-2 right-3" uk-toggle="target: #profile-search;animation: uk-animation-slide-top-small">
        <ion-icon name="search" class="text-xl"></ion-icon>
    </a>
    <div class="absolute bg-white border bottom-2 right-3 rounded-md z-20" id="profile-search" hidden>
        <input type="text" placeholder="Search.." class="max-h-11">
        <ion-icon name="close-outline" class="text-2xl hover:bg-gray-100 p-1 rounded-full cursor-pointer absolute right-2 bottom-1.5" uk-toggle="target: #profile-search;animation: uk-animation-slide-top-small"></ion-icon>
    </div>

</div>
