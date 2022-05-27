@props(['post' => 'post'])

<div uk-lightbox>
    <div class="grid grid-cols-2 gap-2 px-5">
        @if(\Illuminate\Support\Str::contains($post->getFirstMedia('post')->mime_type, 'image'))
            <a href="{{ asset($post->getFirstMediaUrl('post'))}}"
               class="col-span-2">
                <img src="{{ asset($post->getFirstMediaUrl('post'))}}"
                     alt="{{ $post->title }}"
                     class="rounded-md w-full lg:h-76 object-cover">
            </a>
        @endif
    </div>
    @if(\Illuminate\Support\Str::contains($post->getFirstMedia('post')->mime_type, 'video'))
        <a href="{{ asset($post->getFirstMediaUrl('post'))}}">
            <video controls class="max-h-96 w-full object-cover">
                <source
                    src="{{ asset($post->getFirstMediaUrl('post'))}}"/>
            </video>
        </a>
    @endif
</div>
