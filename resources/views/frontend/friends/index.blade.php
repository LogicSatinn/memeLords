<x-master-layout>
    <div class="lg:flex lg:space-x-10">

        <x-frontend.friends.main-section>
            <x-slot:my-friends>
                <x-frontend.friends.friends-section/>
            </x-slot:my-friends>

            <x-slot:mutual-friends>
                <x-frontend.friends.friends-section/>
            </x-slot:mutual-friends>
        </x-frontend.friends.main-section>


        <x-frontend.friends.friends-side-bar/>

    </div>
</x-master-layout>
