<x-master-layout>

    <!-- Main Contents -->

    <x-frontend.topics.topics-top-bar/>

    <x-frontend.topics.topics-slider>
        @foreach($topics as $topic)
            <x-frontend.topics.topics-slider-card :topic="$topic"/>
        @endforeach
    </x-frontend.topics.topics-slider>


    <x-frontend.topics.categories-top-bar/>


    <x-frontend.topics.categories-slider>
        @foreach($categories as $category)
            <x-frontend.topics.categories-slider-card :category="$category"/>
        @endforeach
    </x-frontend.topics.categories-slider>

    <br>

    <x-frontend.topics.more-suggestions-top-bar/>

    <x-frontend.topics.more-suggestions-list>
        @foreach($suggestedTopics as $suggestedTopic)
            <x-frontend.topics.more-suggestions-list-card :topic="$suggestedTopic"/>
        @endforeach
    </x-frontend.topics.more-suggestions-list>


</x-master-layout>
