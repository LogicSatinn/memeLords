<x-guest-layout>
    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div
                class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
            >
                <div
                    class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
                >
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full"
                        alt="Sample image"
                    />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <x-frontend.form-section action="{{ route('register') }}">
                        <x-slot:form>
                            <div class="flex flex-row items-center justify-center text-center lg:justify-start space-x-1.5">
                                <p class="text-lg text-center mb-0 mr-4">Sign Up</p>
                            </div>

                            <div
                                class="flex items-center my-4 before:flex-1 before:mt-0.5 after:flex-1 after:mt-0.5"
                            >
                            </div>

                            <x-tw-elements.input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                                                 required autofocus/>

                            <x-tw-elements.input type="text" name="username" placeholder="Username"
                                                 value="{{ old('username') }}" required autofocus/>

                            <x-tw-elements.input type="email" name="email" placeholder="Email Address"
                                                 value="{{ old('email') }}" required autofocus/>

                            <!-- Password input -->
                            <x-tw-elements.input type="password" name="password" placeholder="Password" required
                                                 autocomplete="new-password"/>

                            <x-tw-elements.input type="password" name="password_confirmation" required
                                                 placeholder="Confirm Password"/>

                            <div class="text-center lg:text-left">
                                <x-tw-elements.button action="Sign Up" type="submit"/>

                                <x-tw-elements.subtitles action="Login" info="Already Registered?"
                                                         href="{{ route('login') }}"/>
                            </div>

                        </x-slot:form>
                    </x-frontend.form-section>

                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
