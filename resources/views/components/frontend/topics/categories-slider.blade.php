<div class="relative -mt-3" uk-slider="finite: true">

    <div class="uk-slider-container px-1 py-3">
        <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

                {{ $slot }}

        </ul>
    </div>

    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10"
       href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10"
       href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

</div>
