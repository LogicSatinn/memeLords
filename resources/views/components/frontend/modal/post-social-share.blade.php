@aware(['post'])

<div class="flex flex-1 items-start space-x-4 p-5">
    <div class="flex-1 pt-2">

        <div id="social-links">
            <ul class="flex space-x-4 items-center justify-center">
                <li>{!! Share::page(route('posts.show', $post))->facebook() !!} </li>
                <li>{!! Share::page(route('posts.show', $post))->twitter() !!}</li>
                <li>{!! Share::page(route('posts.show', $post))->reddit() !!} </li>
                <li>{!! Share::page(route('posts.show', $post))->telegram() !!} </li>
                <li>{!! Share::page(route('posts.show', $post))->whatsapp() !!} </li>
            </ul>
        </div>

    </div>
</div>
