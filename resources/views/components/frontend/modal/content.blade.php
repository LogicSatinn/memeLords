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

{{ $slot }}

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
