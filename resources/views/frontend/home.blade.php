<x-master-layout>
    <div class="lg:flex lg:space-x-10">
        <div class="lg:w-3/4 lg:px-20 space-y-7">
            @foreach($posts as $post)
                {{--   Post Feed --}}
                <x-frontend.home-post-card :post="$post"/>
                {{--  End Post Feed --}}
            @endforeach

            <x-frontend.load-more href="{{ route('posts.index') }}"/>
        </div>
    </div>
</x-master-layout>
