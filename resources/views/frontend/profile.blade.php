<x-master-layout>
    <!-- Main Contents -->

    <!-- Profile cover -->

    <x-frontend.profile.profile-cover/>

    <div class="uk-switcher lg:mt-8 mt-4" id="timeline-tab">

        <!-- Timeline -->
        <div class="md:flex md:space-x-6 lg:mx-16">
            <div class="space-y-5 flex-shrink-0 md:w-7/12">

                <!-- create post  -->
                <x-frontend.posting-card/>

                @foreach($posts as $post)
                    <x-frontend.post-feed-card :post="$post"/>
                @endforeach

                <x-frontend.load-more/>

            </div>

            <!-- Sidebar -->
            <x-frontend.profile.profile-sidebar/>
        </div>

    </div>


    {{--    Edit Profile--}}
    <x-frontend.profile.edit-profile-modal/>
    {{--    End Edit Profile Modal--}}


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
