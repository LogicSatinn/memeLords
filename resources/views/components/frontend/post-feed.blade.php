<div class="lg:flex lg:space-x-10">
    <div class="lg:w-3/4 lg:px-20 space-y-7">

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


{{--        <x-frontend.load-more/>--}}
    </div>

{{--    <x-frontend.side-panel/>--}}
</div>
