<x-master-layout>
    <!-- Main Contents -->

    <!-- Profile cover -->

    <x-frontend.profile.index-profile-cover :user="$user" />

    <div class="uk-switcher lg:mt-8 mt-4" id="timeline-tab">

        <!-- Timeline -->
        <div class="md:flex md:space-x-6 lg:mx-16">
            <div class="space-y-5 flex-shrink-0 md:w-7/12">

                @foreach($posts as $post)
                    <x-frontend.post-feed-card :post="$post"/>
                @endforeach

            </div>

            <!-- Sidebar -->
            <x-frontend.profile.profile-sidebar :friends="$friends" :topics="$topics"/>
        </div>

    </div>


</x-master-layout>
