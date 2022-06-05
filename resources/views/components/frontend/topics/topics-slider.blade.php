<div class="relative" uk-slider="finite: true">

    <div class="uk-slider-container px-1 py-3">
        <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid-small uk-grid">

           {{ $slot }}

        </ul>

        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
           href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
           href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>
</div>
