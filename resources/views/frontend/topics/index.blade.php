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
        <x-frontend.topics.categories-slider-card/>
    </x-frontend.topics.categories-slider>

    <br>

    <x-frontend.topics.more-suggestions-top-bar/>

    <x-frontend.topics.more-suggestions-list>
        <x-frontend.topics.more-suggestions-list-card/>
    </x-frontend.topics.more-suggestions-list>


</x-master-layout>
