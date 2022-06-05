<div class="card lg:mx-0 p-4">
    <div class="flex space-x-3">
        @if(auth()->user()?->getMedia('avatar')->count() === 0)
            <img src="{{ asset('avatar.webp')}}"
                 class="w-10 h-10 rounded-full">
        @else
            <img src="{{ asset(auth()->user()?->getFirstMediaUrl('avatar'))}}"
                 class="w-10 h-10 rounded-full">
        @endif

        <div class="bg-white flex-1 h-10 p-2 rounded-full">
            <p>Try posting something.</p>
        </div>
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
