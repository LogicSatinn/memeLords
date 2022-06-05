@props(['posts', 'topic', 'relatedTopics'])

<div class="md:flex md:space-x-6 lg:mx-16">
    <div class="space-y-5 flex-shrink-0 md:w-7/12">

        {{-- Posting card--}}
        @auth
            <x-frontend.posting-card/>
        @endauth
        {{--End Posting Card--}}


        @foreach($posts as $post)
            {{--   Post Feed --}}
            <x-frontend.post-feed-card :post="$post"/>
            {{--  End Post Feed --}}
        @endforeach

        <x-frontend.load-more/>

    </div>


    <div class="w-full flex-shirink-0">
        @if($topic->owner->id === auth()->id())
            <x-frontend.topics.topic-actions :topic="$topic"/>
        @endif

        <x-frontend.topics.about-topic :topic="$topic"/>

        <x-frontend.topics.related-topics :relatedTopics="$relatedTopics" />
    </div>
</div>

{{-- Create Image modal --}}
<x-frontend.post-modal id="create-image-modal">

    <x-frontend.modal-header :title="'Create a Post'"/>

    <x-frontend.form-section action="{{ route('posts.store') }}" enctype="multipart/form-data">
        <x-slot:form>
            <x-frontend.modal.content>
                <x-frontend.modal.post-button-image name="image"/>
            </x-frontend.modal.content>
        </x-slot:form>
    </x-frontend.form-section>
</x-frontend.post-modal>
{{-- End Create Image modal --}}

{{-- Create video modal --}}
<x-frontend.post-modal id="create-video-modal">

    <x-frontend.modal-header :title="'Add a Video Clip'"/>

    <x-frontend.form-section action="{{ route('posts.store') }}" enctype="multipart/form-data">
        <x-slot:form>
            <x-frontend.modal.content name="clip">
                <x-frontend.modal.post-button-clip name="clip"/>
            </x-frontend.modal.content>
        </x-slot:form>
    </x-frontend.form-section>
</x-frontend.post-modal>
{{-- End Create video modal --}}
