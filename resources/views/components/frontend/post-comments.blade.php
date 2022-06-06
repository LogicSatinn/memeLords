@props(['post', 'comments'])

<div class="p-4 space-y-3">

    <div class="flex space-x-4 lg:font-bold">
        <x-frontend.post-comments-reactions>
            <x-slot:svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor"
                     width="22" height="22" class="dark:text-gray-100">
                    <path
                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                </svg>
            </x-slot:svg>

            <x-slot:reaction>Like</x-slot:reaction>
        </x-frontend.post-comments-reactions>

        <x-frontend.post-comments-reactions href="{{ route('posts.show', $post) }}">
            <x-slot:svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor"
                     width="22" height="22" class="dark:text-gray-100">
                    <path fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"/>
                </svg>
            </x-slot:svg>

            <x-slot:reaction>
                Comment
            </x-slot:reaction>
        </x-frontend.post-comments-reactions>

        <x-frontend.post-comments-reactions class="flex-1 justify-end">
            <x-slot:svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor"
                     width="22" height="22" class="dark:text-gray-100">
                    <path
                        d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                </svg>
            </x-slot:svg>

            <x-slot:reaction>
                Share
            </x-slot:reaction>
        </x-frontend.post-comments-reactions>
    </div>

    <div class="border-t py-4 space-y-4 dark:border-gray-600">
        @foreach($comments as $comment)
        <x-frontend.single-post-comment :comment="$comment" />
            @endforeach
    </div>

    <a href="{{ route('posts.show', $post) }}" class="text-center hover:text-blue-600 hover:underline"> View more
        Comments </a>

    <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
        <x-frontend.form-section
            action="{{ route('addComment', $post) }}"
            id="commentForm"
        >
            <x-slot:form>
                <div class="flex justify-center space-x-1.5">
                    <input placeholder="Add your Comment.." name="comment"
                           class="bg-transparent max-h-10 shadow-none px-5">
                    <button onclick="event.preventDefault(); document.getElementById('commentForm').submit();"
                            class="flex items-center justify-center h-10 w-10 p-1 rounded-md bg-gray-100">
                        Post
                    </button>
                </div>
            </x-slot:form>
        </x-frontend.form-section>
    </div>
</div>
