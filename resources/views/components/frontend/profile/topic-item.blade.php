@props(['topic'])

<div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
    <a href="timeline-group.html" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
        <img src="{{ asset($topic->getFirstMediaUrl('topics'))}}" class="absolute w-full h-full inset-0 " alt="">
    </a>
    <div class="flex-1">
        <a href="timeline-page.html" class="text-base font-semibold capitalize"> {{ $topic->name }} </a>
        <div class="text-sm text-gray-500 mt-0.5"> {{ $topic->count() }} Following</div>
    </div>

    @unless($topic->users()->whereId(auth()->id())->exists())
        <a href="{{ route('joinTopic', $topic) }}"
           class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-blue-500 text-white">
            Join
        </a>
    @endunless
</div>
