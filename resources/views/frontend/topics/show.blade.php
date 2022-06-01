<x-master-layout>
   <x-frontend.topics.topic-profile :topic="$topic"/>

    <x-frontend.topics.topic-posts :posts="$topic->posts" :topic="$topic" />

</x-master-layout>
