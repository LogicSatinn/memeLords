<div {{ $attributes->class(['create-post', 'is-story']) }} uk-modal>
    <div
        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
        {{ $slot }}
    </div>
</div>
