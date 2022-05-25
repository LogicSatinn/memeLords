<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.inc.head')

<body>

<div id="wrapper" class="is-collapse">

    <!-- Header -->
   @include('frontend.layouts.inc.header')

    <!-- sidebar -->
    @include('frontend.layouts.inc.sidebar')

    <!-- Main Contents -->
    @yield('content')

</div>

<!-- sidechat -->
{{--@include('frontend.layouts.inc.sidechat')--}}



<!-- story-preview -->
@include('frontend.layouts.inc.story-preview')


@include('frontend.layouts.inc.scripts')
</body>
</html>
