@props(['topics'])

<div class="w-full space-y-6">

    <x-frontend.profile.associated-topics>
        @foreach($topics as $topic)
            <x-frontend.profile.topic-item :topic="$topic"/>
        @endforeach
    </x-frontend.profile.associated-topics>

</div>
