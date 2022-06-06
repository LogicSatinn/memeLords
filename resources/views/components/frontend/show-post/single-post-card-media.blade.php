@aware(['post'])

@if(\Illuminate\Support\Str::contains($post->getFirstMedia('post')?->mime_type, 'image'))
        <img src="{{ asset($post->getFirstMediaUrl('post'))}}"
             alt="{{ $post->title }}"
             class="w-full h-full absolute inset-0 object-cover">
@endif
@if(\Illuminate\Support\Str::contains($post->getFirstMedia('post')?->mime_type, 'video'))
        <video controls class="w-full h-full absolute inset-0 object-cover">
            <source
                src="{{ asset($post->getFirstMediaUrl('post'))}}"/>
        </video>
@endif
