<x-master-layout>

    <div class="main_content">
        <div class="mcontainer">

            {{--     Feed      --}}
            <x-frontend.post-feed :posts="$posts"/>
            {{--    End Feed     --}}
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


</x-master-layout>
