@props(['post'])

<div class="card lg:mx-0 uk-animation-slide-bottom-small">

    <!-- post header-->
    <div class="flex justify-between items-center lg:p-4 p-2.5">
        <div class="flex flex-1 items-center space-x-4">
            <a href="#">
                @if($post->user->getMedia('avatar')->count() === 0)
                    <img src="{{ asset('avatar.webp')}}"
                         class="bg-gray-200 border border-white rounded-full w-10 h-10" alt="{{ $post->user->name }}">
                @else
                    <img src="{{ asset($post->user->getFirstMediaUrl('avatar'))}}"
                         class="bg-gray-200 border border-white rounded-full w-10 h-10" alt="{{ $post->user->name }}">
                @endif
            </a>
            <div class="flex-1 font-semibold capitalize">
                <a href="{{ route('profile.show', $post->user) }}"
                   class="text-black"> {{ $post->user->username }} </a>
                <div class="text-gray-700 flex items-center space-x-2">
                    <a href="{{ route('posts.show', $post) }}"
                       class="text-black">{{ $post->title }}</a>
                    <ion-icon name="people"></ion-icon>
                </div>
            </div>
        </div>

        @if($post->user->id === auth()->id())
            <x-frontend.post-dropdown>
                <x-frontend.form-section id="deletePost" action="{{ route('posts.destroy', $post) }}" method="POST">
                    <x-slot:form>
                        @method('DELETE')
                        <x-frontend.post-dropdown-link uk-toggle="target: #edit-post-modal{{$post->id}}">
                            <i class="uil-edit-alt mr-2"></i> Edit Post
                        </x-frontend.post-dropdown-link>

                        <x-frontend.post-dropdown-link href="{{ route('posts.destroy', $post) }}"
                                                       onclick="event.preventDefault(); document.getElementById('deletePost').submit();">
                            <i class="uil-trash-alt mr-2"></i> Delete
                        </x-frontend.post-dropdown-link>
                    </x-slot:form>
                </x-frontend.form-section>
            </x-frontend.post-dropdown>
        @endif
    </div>

    <x-frontend.post-feed-media :post="$post"/>

    @auth
        <x-frontend.post-comments :post="$post" :comments="$post->comments->slice(0, 2)"/>
    @endauth

    @guest
        <div class="p-4 space-y-3">

            <div class="flex space-x-4 lg:font-bold">
            </div>

            <div class="border-t py-4 space-y-4">
            </div>

            <div class="bg-gray-100 rounded-full relative border-t">
            </div>
        </div>
    @endguest

</div>
