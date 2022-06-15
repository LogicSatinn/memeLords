<x-master-layout>
<x-frontend.show-post.single-post-feed>
    <x-frontend.show-post.single-post-card :post="$post"/>

    <div class="py-5 space-y-4">

        <x-frontend.show-post.single-post-details :post="$post" :user="$user"/>

        <hr>

        <x-frontend.show-post.comments-card :post="$post">
            @foreach($comments as $comment)
                <x-frontend.show-post.single-comment :comment="$comment"/>
            @endforeach
        </x-frontend.show-post.comments-card>
    </div>
</x-frontend.show-post.single-post-feed>

</x-master-layout>
