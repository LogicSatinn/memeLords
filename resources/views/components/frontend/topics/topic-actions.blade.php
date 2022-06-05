@props(['topic'])

<div class="card p-4 mb-5">

    <h1 class="block text-lg font-bold"> Actions </h1>

    <div class="space-y-4 mt-3">

        <div class="flex items-center space-x-3">
            <a href="{{ route('topics.edit', $topic) }}">
                <i class="uil-edit-alt mr-2"></i> Edit this Topic
            </a>
        </div>
        <div class="flex items-start space-x-3">
            <x-frontend.form-section id="deletePost" action="{{ route('topics.destroy', $topic) }}" method="POST">
                <x-slot:form>
                    @method('DELETE')
                    <button type="submit" onclick="event.preventDefault(); document.getElementById('deletePost').submit();">
                        <i class="uil-trash-alt mr-2"></i> Delete this Topic
                    </button>
                </x-slot:form>
            </x-frontend.form-section>
        </div>

    </div>

</div>
