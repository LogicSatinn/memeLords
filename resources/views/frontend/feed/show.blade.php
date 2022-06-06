<x-master-layout>
    <x-frontend.show-post.single-post-feed>

        <x-frontend.show-post.single-post-card :post="$post" :user="$user"/>

        <x-frontend.show-post.comments-card :post="$post">
            @foreach($comments as $comment)
            <x-frontend.show-post.single-comment :comment="$comment"/>
            @endforeach
        </x-frontend.show-post.comments-card>

    </x-frontend.show-post.single-post-feed>
</x-master-layout>
