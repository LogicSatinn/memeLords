<div>
    <i
        class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700">
    </i>
    <div
        class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
        uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

        <ul class="space-y-1">
            {{ $slot }}
        </ul>

    </div>
</div>
