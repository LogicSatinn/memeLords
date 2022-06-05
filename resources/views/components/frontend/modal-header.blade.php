@props(['title' => 'title'])

<div class="text-center py-3 border-b">
    <h3 class="text-lg font-semibold"> {{ $title }} </h3>
    <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close
            uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
</div>
