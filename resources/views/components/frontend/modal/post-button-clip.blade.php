@props(['name'])

<div class="bsolute bottom-0 p-4 space-x-4 w-full">
    <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
        <div class="lg:block hidden ml-1"> Add to your post</div>
        <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
            <label for="{{ $name }}">
                <input type="file" id="{{ $name }}" name="{{ $name }}" style="display: none;">
                <svg
                    class="text-red-600 mr-2 h-9 p-1.5 rounded-full bg-red-100 w-9 -my-0.5 hidden lg:block cursor-pointer"
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
