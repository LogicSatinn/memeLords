<form {{ $attributes->merge(['method' => 'POST']) }} >
    @csrf
    {{ $form }}
</form>
