@props(['topics', 'friends'])

<div class="w-full space-y-6">

    <x-frontend.profile.associated-topics>
        @foreach($topics as $topic)
            <x-frontend.profile.topic-item :topic="$topic"/>
        @endforeach
    </x-frontend.profile.associated-topics>

{{--    Friends--}}
    <x-frontend.profile.associated-friends>
        @foreach($friends as $user)
            <x-frontend.profile.friends-item :user="$user"/>
        @endforeach
    </x-frontend.profile.associated-friends>
</div>
