<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col space-y-3">
                        <div class="mb-2 p-3">
                            <button type="button"
                                    class="inline-block px-6 py-4.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-bs-toggle="modal" data-bs-target="#createCategory">
                                New Category
                            </button>
                        </div>
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Topics
                                            </th>
                                            <th scope="col"
                                                class="text-center text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Handle
                                            </th>
                                        </tr>
                                        </thead>
                                        @php $i=1 @endphp
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $i++ }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $category->name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Otto
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <div
                                                        class="flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-gray-200 rounded-b-md">

                                                        <button type="button"
                                                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editCategory">
                                                            Edit
                                                        </button>

                                                        <div
                                                            class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                            id="editCategory" tabindex="-1"
                                                            aria-labelledby="editCategoryTitle"
                                                            aria-modal="true"
                                                            role="dialog">
                                                            <div
                                                                class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                                                                <div
                                                                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                    <div
                                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                            id="exampleModalScrollableLabel">
                                                                            Edit Category
                                                                        </h5>
                                                                        <button type="button"
                                                                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body relative p-4">
                                                                        <x-frontend.form-section
                                                                            action="{{ route('categories.update', $category) }}"
                                                                            id="editCategoryForm"
                                                                            enctype="multipart/form-data">
                                                                            <x-slot:form>
                                                                                @method('PUT')
                                                                                <div class="mb-3 w-96">
                                                                                    <label for="name"
                                                                                           class="form-label inline-block mb-2 text-gray-700">Name</label>
                                                                                    <input type="email"
                                                                                           class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                                           id="name" name="name"
                                                                                           value="{{ $category->name }}"
                                                                                           aria-describedby="Name">
                                                                                </div>
                                                                                <div class="mb-3 w-96">
                                                                                    <label for="formFile"
                                                                                           class="form-label inline-block mb-2 text-gray-700">Cover
                                                                                        Image</label>
                                                                                    <input
                                                                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                                        name="cover_image" type="file"
                                                                                        id="formFile">
                                                                                </div>
                                                                            </x-slot:form>
                                                                        </x-frontend.form-section>
                                                                    </div>
                                                                    <div
                                                                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                                        <button type="button"
                                                                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                                                data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit"
                                                                                onclick="event.preventDefault(); document.getElementById('editCategoryForm').submit();"
                                                                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                                            Save changes
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <x-frontend.form-section
                                                            action="{{ route('categories.destroy', $category) }}"
                                                            id="deleteCategoryForm">
                                                            <x-slot:form>
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        onclick="event.preventDefault(); document.getElementById('deleteCategoryForm').submit();"
                                                                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                                    Delete
                                                                </button>
                                                            </x-slot:form>
                                                        </x-frontend.form-section>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
         id="createCategory" tabindex="-1" aria-labelledby="createCategoryTitle" aria-modal="true"
         role="dialog">


        <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                        Add new Category
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <x-frontend.form-section action="{{ route('categories.store') }}" id="categoryForm" enctype="multipart/form-data">
                        <x-slot:form>
                            <div class="mb-3 w-96">
                                <label for="name"
                                       class="form-label inline-block mb-2 text-gray-700">Name</label>
                                <input type="text"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                       id="name" name="name"
                                       placeholder="Name"
                                       value="{{ old('name') }}"
                                       aria-describedby="Name">
                                @error('name')
                                <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3"
                                     role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 w-96">
                                <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Cover
                                    Image</label>
                                <input
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="cover_image" type="file" id="formFile">
                                @error('cover_image')
                                <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3"
                                     role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </x-slot:form>
                    </x-frontend.form-section>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit"
                            onclick="event.preventDefault(); document.getElementById('categoryForm').submit();"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
