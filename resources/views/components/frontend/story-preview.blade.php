<div class="story-prev">

    <div class="story-sidebar uk-animation-slide-left-medium">
        <div class="md:flex justify-between items-center py-2 hidden">
            <h3 class="text-2xl font-semibold"> All Story </h3>
            <a href="#" class="text-blue-600"> Setting</a>
        </div>

        <div class="story-sidebar-scrollbar" data-simplebar>
            <h3 class="text-lg font-medium"> Your Story </h3>

            <a class="flex space-x-4 items-center hover:bg-gray-100 md:my-2 py-2 rounded-lg hover:text-gray-700" href="#">
                <svg class="w-12 h-12 p-3 bg-gray-200 rounded-full text-blue-500 ml-1" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <div class="flex-1">
                    <div class="text-lg font-semibold"> Create a story </div>
                    <div class="text-sm -mt-0.5"> Share a photo or write something. </div>
                </div>
            </a>

            <h3 class="text-lg font-medium lg:mt-3 mt-1"> Friends Story </h3>

            <div class="story-users-list"  uk-switcher="connect: #story_slider ; toggle: > * ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium ">

                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Dennis Han</div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 4Mn ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani</div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 1hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-3.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username">Alex Dolgove </div>
                        <p> <span class="story-count"> 3 new </span> <span class="story-time"> 2hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-4.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Stella Johnson </div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-5.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani </div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-8.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Dennis Han</div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 8Hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-6.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani</div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 12hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-7.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username">Alex Dolgove </div>
                        <p> <span class="story-count"> 3 new </span> <span class="story-time"> 22hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-8.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Stella Johnson </div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3Dy ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="{{ asset('assets/images/avatars/avatar-5.jpg')}}" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani </div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4Dy ago</span> </p>
                    </div>
                </a>


            </div>


        </div>

    </div>
    <div class="story-content">

        <ul class="uk-switcher uk-animation-scale-up" id="story_slider" >
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="{{ asset('assets/images/avatars/avatar-lg-2.jpg')}}" data-alt="Image">
                        <img src="{{ asset('assets/images/avatars/avatar-lg-2.jpg')}}" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="{{ asset('assets/images/avatars/avatar-lg-1.jpg')}}" data-alt="Image">
                        <img src="{{ asset('assets/images/avatars/avatar-lg-1.jpg')}}" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="{{ asset('assets/images/avatars/avatar-lg-4.jpg')}}" data-alt="Image">
                        <img src="{{ asset('assets/images/avatars/avatar-lg-4.jpg')}}" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>

            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
        </ul>

    </div>

    <!-- story colose button-->
    <span class="story-btn-close" uk-toggle="target: body ; cls: story-active"
          uk-tooltip="title:Close story ; pos: left">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </span>

</div>
