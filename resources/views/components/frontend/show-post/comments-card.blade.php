@props(['post'])

<div class="text-lg font-semibold pt-2"> Comments ( {{ $post->comments->count() }} )</div>

<div class="my-5">
    <div class="space-y-5">
        {{ $slot }}
    </div>

    <x-frontend.form-section
        action="{{ route('addComment', $post) }}"
        id="commentForm"
    >
        <x-slot:form>
            <div class="flex justify-center mt-9 space-x-1.5">
                <input placeholder="Add your Comment.." name="comment"
                       class="bg-gray-700 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">
                <button onclick="event.preventDefault(); document.getElementById('commentForm').submit();"
                        class="flex items-center justify-center h-10 w-10 p-1 rounded-md bg-gray-100">
                    Post
                </button>
            </div>
        </x-slot:form>
    </x-frontend.form-section>
</div>
