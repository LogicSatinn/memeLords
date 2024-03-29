<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.inc.head')

<body>

<div id="wrapper" class="is-collapse">

    <!-- Header -->
    <x-frontend.header/>

    <!-- sidebar -->
    <x-frontend.side-bar/>

    <!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            {{ $slot }}

        </div>
    </div>
</div>

<!-- sidechat -->
{{--<x-frontend.side-chat/>--}}


<!-- story-preview -->
<x-frontend.story-preview/>

@include('frontend.layouts.inc.scripts')
</body>
</html>
