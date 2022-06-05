@props(['relatedTopics'])

<div class="widget card p-5 border-t">
    <div class="flex items-center justify-between mb-2">
        <div>
            <h4 class="text-lg font-semibold"> Related Topics </h4>
        </div>
        <a href="#" class="text-blue-600 "> See all</a>
    </div>
    <div>

        @foreach($relatedTopics as $relatedTopic)
            <x-frontend.topics.single-related-topic :topic="$relatedTopic"/>
        @endforeach
    </div>
</div>
