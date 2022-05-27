{{--@extends('frontend.layouts.index')--}}
<x-master-layout>

    <div class="main_content">
        <div class="mcontainer">

            @if($posts !== null)

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

                        @foreach($posts as $post)
                            {{--   Post Feed --}}
                    <x-frontend.post-feed :post="$post" />
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
                <h3 class="text-lg font-semibold"> Add a Video Clip </h3>
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
</x-master-layout>
{{--@section('content')--}}


{{--@endsection--}}
