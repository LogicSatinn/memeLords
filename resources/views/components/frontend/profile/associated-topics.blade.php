<div class="widget card p-5 border-t">
    <div class="flex items-center justify-between mb-2">
        <div>
            <h4 class="text-lg font-semibold">Topics </h4>
        </div>
        <a href="{{ route('topics.index') }}" class="text-blue-600 "> See all</a>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
