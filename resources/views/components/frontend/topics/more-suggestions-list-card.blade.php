@props(['topic'])

<div class="flex items-center space-x-4">
    <div class="w-20 h-20 flex-shrink-0 rounded-md relative mb-3">
        <img src="{{ asset($topic->getFirstMediaUrl('topics'))}}"
             class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
    </div>
    <div class="flex-1 border-b pb-3">
        <a href="{{ route('topics.show', $topic) }}" class="text-lg font-semibold capitalize"> {{ $topic->name }} </a>
        <div class="flex space-x-2 items-center text-sm">
            <div> {{ $topic->users->count() }} memeLords</div>
            <div>·</div>
            <div> {{ $topic->posts->count() }} posts</div>
        </div>


    </div>
    <a href="#" class="flex items-center justify-center h-9 px-3 rounded-md bg-blue-100 text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 mr-2">
            <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                  clip-rule="evenodd"></path>
        </svg>
        Join
    </a>
</div>
