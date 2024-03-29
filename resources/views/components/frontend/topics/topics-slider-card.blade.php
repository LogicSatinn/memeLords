@props(['topic'])

<li>
    <div class="card">
        <div class="card-media h-28">
            <div class="card-media-overly"></div>
{{--            <img src="{{ asset($topic->getFirstMediaUrl('topics'))}}" alt="{{ $topic->name }}" class="">--}}
            @if($topic->getMedia('topics')->count() === 0)
                <img src="{{ asset('avatar.webp')}}"
                     class="" alt="{{ $topic->name }}">
            @else
                <img src="{{ asset($topic->getFirstMediaUrl('topics'))}}"
                     class="" alt="{{ $topic->name }}">
            @endif
            <div
                class="absolute bg-red-100 font-semibold px-2.5 py-1 rounded-lg text-red-500 text-xs top-2.5 left-2.5">
                Trend
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('topics.show', $topic) }}" class="font-semibold text-lg truncate">{{ $topic->name }}</a>
            <div
                class="flex items-center flex-wrap space-x-1 mt-1 text-sm text-gray-500 capitalize">
                <a href="#"> <span> {{ $topic->users->count() }} memeLords </span> </a>
                <a href="#"> <span> {{ $topic->posts->count() }} posts </span> </a>
            </div>
            <div class="flex mt-3.5 space-x-2">
                {{--                <div class="flex-1 leading-5 text-sm">--}}
                {{--                    <div><strong>Johnson</strong> and 5 freind are members</div>--}}
                {{--                </div>--}}
            </div>

            <div class="flex mt-3.5 space-x-2 text-sm font-medium">
                @unless($topic->users()->whereId(auth()->id())->exists())
                    <a href="{{ route('joinTopic', $topic) }}"
                        @class([
            'bg-blue-600 flex flex-1 h-8 items-center justify-center rounded-md text-white capitalize',
                            'disabled:opacity-25' => $topic->users()->whereId(auth()->id())->exists(),
                        ])>
                        Join
                    </a>
                @endunless
                <a href="{{ route('topics.show', $topic) }}"
                   class="bg-gray-200 flex flex-1 h-8 items-center justify-center rounded-md capitalize">
                    View
                </a>
            </div>

        </div>
    </div>
</li>
