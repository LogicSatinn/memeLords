<div class="lg:flex lg:space-x-10">
    <div class="lg:w-3/4 lg:px-20 space-y-7">

        {{--  User Story--}}
        <div class="user_story grid md:grid-cols-5 grid-cols-3 gap-2 lg:-mx-20 relative">

            <a href="#create-post" uk-toggle="target: body ; cls: story-active">
                <div class="single_story">
                    <img src="{{ asset('assets/images/avatars/avatar-lg-1.jpg')}}" alt="">
                    <div class="story-avatar"><img
                            src="{{ asset('assets/images/avatars/avatar-6.jpg')}}" alt=""></div>
                    <div class="story-content"><h4>Erica Jones </h4></div>
                </div>
            </a>
            <a href="#" uk-toggle="target: body ; cls: story-active">
                <div class="single_story">
                    <img src="{{ asset('assets/images/avatars/avatar-lg-2.jpg')}}" alt="">
                    <div class="story-avatar"><img
                            src="{{ asset('assets/images/avatars/avatar-2.jpg')}}" alt=""></div>
                    <div class="story-content"><h4> Dennis Han</h4></div>
                </div>
            </a>
            <a href="#" uk-toggle="target: body ; cls: story-active">
                <div class="single_story">
                    <img src="{{ asset('assets/images/avatars/avatar-lg-3.jpg')}}" alt="">
                    <div class="story-avatar"><img
                            src="{{ asset('assets/images/avatars/avatar-3.jpg')}}" alt=""></div>
                    <div class="story-content"><h4> Alex Mohani</h4></div>
                </div>
            </a>
            <a href="#" uk-toggle="target: body ; cls: story-active">
                <div class="single_story">
                    <img src="{{ asset('assets/images/avatars/avatar-lg-4.jpg')}}" alt="">
                    <div class="story-avatar"><img
                            src="{{ asset('assets/images/avatars/avatar-4.jpg')}}" alt=""></div>
                    <div class="story-content"><h4> Jonathan </h4></div>
                </div>
            </a>
            <a href="#" uk-toggle="target: body ; cls: story-active">
                <div class="single_story">
                    <img src="{{ asset('assets/images/avatars/avatar-lg-5.jpg')}}" alt="">
                    <div class="story-avatar"><img
                            src="{{ asset('assets/images/avatars/avatar-5.jpg')}}" alt=""></div>
                    <div class="story-content"><h4> Stella Johnson</h4></div>
                </div>
            </a>

            <span class="absolute bg-white lg:flex items-center justify-center p-2 rounded-full
                            shadow-md text-xl w-9 z-10 uk-position-center-right -mr-4 hidden"
                  uk-toggle="target: body ; cls: story-active">
                            <i class="icon-feather-chevron-right"></i></span>

        </div>
        {{--End User Story--}}

        {{-- Posting card--}}
        @auth
            <x-frontend.posting-card/>
        @endauth
        {{--End Posting Card--}}

        @foreach($posts as $post)
            {{--   Post Feed --}}
            <x-frontend.post-feed-card :post="$post"/>
            {{--  End Post Feed --}}
        @endforeach


        <div class="flex justify-center mt-6">
            <a href="#"
               class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                Load more ..</a>
        </div>
    </div>

    <x-frontend.side-panel/>
</div>
