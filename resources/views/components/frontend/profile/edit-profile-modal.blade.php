<div id="offcanvas-create" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar lg:w-4/12 w-full dark:bg-gray-700 dark:text-gray-300 p-0 bg-white shadow-2xl">

        <button class="uk-offcanvas-close absolute" type="button" uk-close></button>

        <!-- notivication header -->
        <div class="-mb-1 border-b font-semibold px-5 py-5 text-lg">
            <h4> Edit Profile </h4>
        </div>

        <x-frontend.form-section action="{{ route('profile.update', auth()->user()) }}" enctype="multipart/form-data">
            <x-slot name="form">
                @method('PUT')
                <div class="p-6 space-y-3 flex-1">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>


                    <div>
                        <label>Name </label>
                        <input type="text" name="name" class="with-border" value="{{ old('name') }}">
                    </div>

                    <div>
                        <label>Username </label>
                        <input type="text" name="username" value="{{ old('username') }}" class="with-border" placeholder="">
                    </div>

                    <div>
                        <label>Email </label>
                        <input type="text" name="email" value="{{ old('email') }}" class="with-border" placeholder="">
                    </div>

                    <div uk-form-custom class="w-full py-3">
                        <label class="mb-3">Upload Profile Picture </label>
                        <div
                            class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"/>
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z"/>
                            </svg>
                        </div>
                        <input type="file" name="avatar">
                    </div>
                </div>
                <div class="p-5">
                    <button type="submit" class="button w-full">
                        Update Profile
                    </button>
                </div>
            </x-slot>
        </x-frontend.form-section>


    </div>
</div>
