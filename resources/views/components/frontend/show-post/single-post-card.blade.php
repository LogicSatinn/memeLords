@props(['post'])

<div class="card lg:mx-0 uk-animation-slide-bottom-small">

    <!-- post header-->
    <div class="flex justify-between items-center lg:p-4 p-2.5">
    </div>

    <x-frontend.post-feed-media :post="$post"/>

</div>
