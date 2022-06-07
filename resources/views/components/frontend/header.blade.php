<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">

                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path
                                    d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                        </span>

                <div id="logo">
                    <a href="{{ url('/posts') }}">
                        <img src="{{ asset('logo/default-monochrome-black.svg')}}" alt="">
                        <img src="{{ asset('logo/default-monochrome-black.svg')}}" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <div class="right_side">

                <div class="header_widgets">

                    @guest
                        <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-2 text-center text-sm">
                            <a href="{{ route('login') }}" class="py-3 px-4"> Login </a>
                            <a href="{{ route('register') }}"
                               class="bg-purple-500 purple-500 px-5 py-3 rounded-md shadow text-white">Register</a>
                        </div>
                    @endguest

                    <a href="#">
                        @auth
                            @if(auth()->user()->getMedia('avatar')->count() === 0)
                                <img src="{{ asset('avatar.webp')}}" class="is_avatar" alt="{{ auth()->user()->name }}">
                            @else
                                <img src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" class="is_avatar"
                                     alt="{{ auth()->user()->name }}">
                            @endif
                        @endauth

                        @guest
                            <img src="{{ asset('avatar.webp')}}" class="is_avatar" alt="">
                        @endguest
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <div class="user">
                            <div class="user_name">
                                @auth
                                    <div class="text-center"> {{ auth()->user()->name }} </div>
                                    <span class="text-center"> {{ auth()->user()->username }} </span>
                                @endauth

                                @guest
                                    <div class="text-center"> Your Name?!</div>
                                    <span class="text-center"> @memeLord </span>
                                @endguest
                            </div>
                        </div>
                        <hr>
                        @auth
                            <a href="{{ route('profile.show', auth()->user()) }}">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                My Profile
                            </a>
                        @endauth
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                            Night mode
                            <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                        </a>
                        @auth
                            <x-frontend.form-section id="logout" action="{{ route('logout') }}" method="POST">
                                <x-slot:form>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Log Out
                                    </a>
                                </x-slot:form>
                            </x-frontend.form-section>
                        @endauth

                    </div>

                </div>

            </div>
        </div>
    </div>
</header>
