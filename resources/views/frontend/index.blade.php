@extends('frontend.layouts.index')

@section('content')

    <div class="main_content">
        <div class="mcontainer">

            @if($postsWithImages !== null || $postsWithClips !== null)

                <!-- feed -->
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
                        <div class="card lg:mx-0 p-4">
                            <div class="flex space-x-3">
                                <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                                     class="w-10 h-10 rounded-full">
                                <input placeholder="What's cracking you up? Hamse!"
                                       class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                            </div>
                            <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                                <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer"
                                     uk-toggle="target: #create-image-modal">
                                    <svg
                                        class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block"
                                        data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Photo
                                </div>
                                <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer"
                                     uk-toggle="target: #create-video-modal">
                                    <svg
                                        class="text-red-600 mr-2 h-9 p-1.5 rounded-full bg-red-100 w-9 -my-0.5 hidden lg:block cursor-pointer"
                                        fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                                    </svg>
                                    Video
                                </div>
                            </div>
                        </div>
                        {{--End Posting Card--}}

                        @foreach($postsWithImages as $postWithImage)
                            {{--   Post 1 --}}
                            <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                                <!-- post header-->
                                <div class="flex justify-between items-center lg:p-4 p-2.5">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                                                 class="bg-gray-200 border border-white rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex-1 font-semibold capitalize">
                                            <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                            <div class="text-gray-700 flex items-center space-x-2">
                                                {{ $postWithImage->title }}
                                                <ion-icon name="people"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#"> <i
                                                class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                                        </a>
                                        <div
                                            class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                            uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                            <ul class="space-y-1">
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-share-alt mr-1"></i> Share
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-edit-alt mr-1"></i> Edit Post
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-comment-slash mr-1"></i> Disable comments
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-favorite mr-1"></i> Add favorites
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="-mx-2 my-2 dark:border-gray-800">
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                                        <i class="uil-trash-alt mr-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>


                                <div uk-lightbox>
                                    <div class="grid grid-cols-2 gap-2 px-5">

                                        <a href="{{ asset('storage/media/' . $postWithImage->image?->image_path)}}"
                                           class="col-span-2">
                                            <img src="{{ asset('storage/media/' . $postWithImage->image?->image_path)}}"
                                                 alt="{{ $postWithImage->title }}"
                                                 class="rounded-md w-full lg:h-76 object-cover">
                                        </a>

                                    </div>
                                </div>

                                <div class="p-4 space-y-3">

                                    <div class="flex space-x-4 lg:font-bold">
                                        <a href="#" class="flex items-center space-x-2">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                            </div>
                                            <div> Like</div>
                                        </a>
                                        <a href="#" class="flex items-center space-x-2">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path fill-rule="evenodd"
                                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div> Comment</div>
                                        </a>
                                        <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path
                                                        d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                </svg>
                                            </div>
                                            <div> Share</div>
                                        </a>
                                    </div>
                                    <div class="flex items-center space-x-3 pt-2">
                                        <div class="dark:text-gray-100">
                                            Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                                        </div>
                                    </div>

                                    <div class="border-t py-4 space-y-4 dark:border-gray-600">
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt=""
                                                     class="absolute h-full rounded-full w-full">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                                    <p class="leading-6">In ut odio libero vulputate
                                                        <urna class="i uil-heart"></urna>
                                                        <i
                                                            class="uil-grin-tongue-wink"> </i></p>
                                                    <div
                                                        class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                </div>
                                                <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                                    <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                                    </a>
                                                    <a href="#"> Replay </a>
                                                    <span> 3d </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt=""
                                                     class="absolute h-full rounded-full w-full">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                                    <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut
                                                        laoreet
                                                        dolore magna aliquam erat volutpat. David !<i
                                                            class="uil-grin-tongue-wink-alt"></i></p>
                                                    <div
                                                        class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                </div>
                                                <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                                    <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                                    </a>
                                                    <a href="#"> Replay </a>
                                                    <span> 3d </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more
                                        Comments </a>

                                    <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                                        <input placeholder="Add your Comment.."
                                               class="bg-transparent max-h-10 shadow-none px-5">
                                        <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                            <a href="#">
                                                <ion-icon name="happy-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                            <a href="#">
                                                <ion-icon name="image-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                            <a href="#">
                                                <ion-icon name="link-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  End Post 1--}}
                        @endforeach

                        @foreach($postsWithClips as $postWithClip)
                            {{--    Post 2--}}
                            <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                                <!-- post header-->
                                <div class="flex justify-between items-center lg:p-4 p-2.5">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                                                 class="bg-gray-200 border border-white rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex-1 font-semibold capitalize">
                                            <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                            <div class="text-gray-700 flex items-center space-x-2">
                                                {{ $postWithClip->title }}
                                                <ion-icon name="people"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#"> <i
                                                class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                                        </a>
                                        <div
                                            class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                            uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                            <ul class="space-y-1">
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-share-alt mr-1"></i> Share
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-edit-alt mr-1"></i> Edit Post
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-comment-slash mr-1"></i> Disable comments
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                        <i class="uil-favorite mr-1"></i> Add favorites
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="-mx-2 my-2 dark:border-gray-800">
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                                        <i class="uil-trash-alt mr-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                                <div uk-lightbox>
                                    <a href="{{ asset('storage/media/' . $postWithClip->clip?->clip_path)}}">
                                        <video controls class="max-h-96 w-full object-cover">
                                            <source
                                                src="{{ asset('storage/media/' . $postWithClip->clip?->clip_path)}}"/>
                                        </video>
                                    </a>
                                </div>

                                <div class="p-4 space-y-3">

                                    <div class="flex space-x-4 lg:font-bold">
                                        <a href="#" class="flex items-center space-x-2">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                            </div>
                                            <div> Like</div>
                                        </a>
                                        <a href="#" class="flex items-center space-x-2">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path fill-rule="evenodd"
                                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div> Comment</div>
                                        </a>
                                        <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                            <div
                                                class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     width="22" height="22" class="dark:text-gray-100">
                                                    <path
                                                        d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                </svg>
                                            </div>
                                            <div> Share</div>
                                        </a>
                                    </div>
                                    <div class="border-t py-4 space-y-4 dark:border-gray-600">
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt=""
                                                     class="absolute h-full rounded-full w-full">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                    <p class="leading-6">In ut odio libero vulputate
                                                        <urna class="i uil-heart"></urna>
                                                        <i
                                                            class="uil-grin-tongue-wink"> </i></p>
                                                    <div
                                                        class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                </div>
                                                <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                                    <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                                    </a>
                                                    <a href="#"> Replay </a>
                                                    <span> 3d </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt=""
                                                     class="absolute h-full rounded-full w-full">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                    <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut
                                                        laoreet
                                                        dolore magna aliquam erat volutpat. David !<i
                                                            class="uil-grin-tongue-wink-alt"></i></p>
                                                    <div
                                                        class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                </div>
                                                <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                                    <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                                    </a>
                                                    <a href="#"> Replay </a>
                                                    <span> 3d </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more
                                        Comments </a>

                                    <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                                        <input placeholder="Add your Comment.."
                                               class="bg-transparent max-h-10 shadow-none px-5">
                                        <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                            <a href="#">
                                                <ion-icon name="happy-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                            <a href="#">
                                                <ion-icon name="image-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                            <a href="#">
                                                <ion-icon name="link-outline"
                                                          class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--   End Post 2--}}
                        @endforeach


                        <div class="flex justify-center mt-6">
                            <a href="#"
                               class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                                Load more ..</a>
                        </div>


                    </div>

                    @include('frontend.layouts.inc.side-panel')
                </div>

            @else
                <div class="lg:flex lg:space-x-10">
                    <div class="lg:w-3/4 lg:px-20 space-y-7">
                        {{-- Posting card--}}
                        <div class="card lg:mx-0 p-4">
                            <div class="flex space-y-3 mb-4">
                                So empty. Try posting something.
                            </div>

                            <div class="flex space-x-3">
                                <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                                     class="w-10 h-10 rounded-full">
                                <input placeholder="What's cracking you up? Hamse!"
                                       class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                            </div>
                            <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                                <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer"
                                     uk-toggle="target: #create-image-modal">
                                    <svg
                                        class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block"
                                        data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Photo
                                </div>
                                <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer"
                                     uk-toggle="target: #create-video-modal">
                                    <svg
                                        class="text-red-600 mr-2 h-9 p-1.5 rounded-full bg-red-100 w-9 -my-0.5 hidden lg:block cursor-pointer"
                                        fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                                    </svg>
                                    Video
                                </div>
                            </div>
                        </div>
                        {{--End Posting Card--}}
                    </div>
                </div>
            @endif
        </div>
    </div>


    <!-- Create image modal -->
    <div id="create-image-modal" class="create-post is-story" uk-modal>
        <div
            class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

            <div class="text-center py-3 border-b">
                <h3 class="text-lg font-semibold"> Create Post </h3>
                <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close
                        uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
            </div>

            <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="flex flex-1 items-start space-x-4 p-5">
                    <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                         class="bg-gray-200 border border-white rounded-full w-11 h-11">
                    <div class="flex-1 pt-2">
                    <textarea
                        class="uk-textarea text-black shadow-none focus:shadow-none text-xl font-medium resize-none"
                        rows="5"
                        name="title"
                        placeholder="What's cracking you up ? Stella!"></textarea>
                    </div>

                </div>
                <div class="bsolute bottom-0 p-4 space-x-4 w-full">
                    <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                        <div class="lg:block hidden ml-1"> Add to your post</div>
                        <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                            <label for="image">
                                <input type="file" id="image" name="image" style="display: none;">
                                <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </label>

                            <label for="">
                                <svg class="text-green-600 h-9 p-1.5 rounded-full bg-green-100 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                            </label>

                            <label for="">
                                <svg class="text-pink-600 h-9 p-1.5 rounded-full bg-pink-100 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="flex items-center w-full justify-between border-t p-3">

                    <select name="visibility" class="selectpicker mt-2 story">
                        <option>Only me</option>
                        <option>Every memeLords</option>
                        <option>memeLords I Follow</option>
                        <option>memeLords that Follow Me</option>
                    </select>

                    <div class="flex space-x-2">
                        <a href="#"
                           class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                            <svg class="h-5 pr-1 rounded-full text-red-500 w-6 fill-current" id="veiw-more" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                 aria-hidden="false" style="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            Live </a>
                        <button type="submit"
                                class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                            Share
                        </button>
                    </div>

                    <a href="#" hidden
                       class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold">
                        Share </a>
                </div>
            </form>
        </div>
    </div>



    <!-- Create video modal -->
    <div id="create-video-modal" class="create-post is-story" uk-modal>
        <div
            class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

            <div class="text-center py-3 border-b">
                <h3 class="text-lg font-semibold"> Create Post </h3>
                <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close
                        uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
            </div>

            <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="flex flex-1 items-start space-x-4 p-5">
                    <img src="{{ asset('assets/images/avatars/avatar-2.jpg')}}"
                         class="bg-gray-200 border border-white rounded-full w-11 h-11">
                    <div class="flex-1 pt-2">
                    <textarea
                        class="uk-textarea text-black shadow-none focus:shadow-none text-xl font-medium resize-none"
                        rows="5"
                        name="title"
                        placeholder="What's cracking you up ? Stella!"></textarea>
                    </div>

                </div>
                <div class="bsolute bottom-0 p-4 space-x-4 w-full">
                    <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                        <div class="lg:block hidden ml-1"> Add to your post</div>
                        <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                            <label for="clip">
                                <input type="file" id="clip" name="clip" style="display: none;">
                                <svg class="text-red-600 h-9 p-1.5 rounded-full bg-red-100 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                                </svg>
                            </label>

                            <label for="">
                                <svg class="text-green-600 h-9 p-1.5 rounded-full bg-green-100 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                            </label>

                            <label for="">
                                <svg class="text-pink-600 h-9 p-1.5 rounded-full bg-pink-100 w-9 cursor-pointer"
                                     fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="flex items-center w-full justify-between border-t p-3">

                    <select name="visibility" class="selectpicker mt-2 story">
                        <option>Only me</option>
                        <option>Every memeLords</option>
                        <option>memeLords I Follow</option>
                        <option>memeLords that Follow Me</option>
                    </select>

                    <div class="flex space-x-2">
                        <a href="#"
                           class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                            <svg class="h-5 pr-1 rounded-full text-red-500 w-6 fill-current" id="veiw-more" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                 aria-hidden="false" style="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            Live </a>
                        <button type="submit"
                                class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                            Share
                        </button>
                    </div>

                    <a href="#" hidden
                       class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold">
                        Share </a>
                </div>
            </form>
        </div>
    </div>

@endsection
