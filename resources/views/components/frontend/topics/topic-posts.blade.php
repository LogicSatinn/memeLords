@props(['posts', 'topic'])

<div class="md:flex md:space-x-6 lg:mx-16">
    <div class="space-y-5 flex-shrink-0 md:w-7/12">

        {{-- Posting card--}}
        <x-frontend.posting-card />
        {{--End Posting Card--}}


        @foreach($posts as $post)
            {{--   Post Feed --}}
            <x-frontend.post-feed-card :post="$post" />
            {{--  End Post Feed --}}
        @endforeach

        <div class="flex justify-center mt-6">
            <a href="#" class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                Load more ..</a>
        </div>

    </div>


    <div class="w-full flex-shirink-0">
        <x-frontend.topics.topic-actions :topic="$topic" />

        <x-frontend.topics.about-topic :topic="$topic" />

        <x-frontend.topics.related-topics />
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
