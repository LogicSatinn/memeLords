@props(['relatedTopics'])

<div class="widget card p-5 border-t">
    <div class="flex items-center justify-between mb-2">
        <div>
            <h4 class="text-lg font-semibold"> Related Topics </h4>
        </div>
        <a href="#" class="text-blue-600 "> See all</a>
    </div>
    <div>

        {{--        <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">--}}
        {{--            <a href="#" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">--}}
        {{--                <img src="{{ asset('assets/images/group/group-3.jpg')}}" class="absolute w-full h-full inset-0 " alt="">--}}
        {{--            </a>--}}
        {{--            <div class="flex-1">--}}
        {{--                <a href="#" class="text-base font-semibold capitalize"> Graphic Design  </a>--}}
        {{--                <div class="text-sm text-gray-500 mt-0.5"> 345K  Following</div>--}}
        {{--            </div>--}}
        {{--            <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-blue-500 text-white">--}}
        {{--                Join--}}
        {{--            </a>--}}
        {{--        </div>--}}

        @foreach($relatedTopics as $relatedTopic)
            <x-frontend.topics.single-related-topic :topic="$relatedTopic"/>
        @endforeach
    </div>
</div>
