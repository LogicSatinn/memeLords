@props(['name'])

<div class="bsolute bottom-0 p-4 space-x-4 w-full">
    <div class="flex bg-white-50 border border-purple-100 rounded-2xl p-2 space-x-1.5 shadow-sm items-center">
        <label for="formFile" class="form-label inline-block text-gray-700">Video</label>
        <input class="form-control
    block
    w-full
    px-2
    py-1
    text-sm
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="{{ $name }}" type="file"
               id="formFile">
    </div>
    @error($name)
    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
        {{ $message }}
    </div>
    @enderror
</div>
