<x-guest-layout>
    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full"
                        alt="Phone image"
                    />
                </div>
                <div class="md:w-8/12 lg:w-5/12 lg:ml-20">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')"/>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <x-tw-elements.subtitles info="Don't have an account?" action="Register"
                                             href="{{ route('register') }}"/>

                    <x-frontend.form-section action="{{ route('login') }}">
                        <x-slot name="form">
                            <x-tw-elements.input type="email" name="email" placeholder="Email Address"
                                                 value="{{ old('email') }}" required autofocus/>

                            <x-tw-elements.input type="password" name="password" placeholder="Password" required
                                                 autocomplete="current-password"/>

                            <div class="flex justify-between items-center mb-6">
                                <div class="form-group form-check">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        id="remember_me"
                                        checked
                                    />
                                    <label class="form-check-label inline-block text-gray-800" for="remember_me"
                                    >Remember me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
                                    >Forgot password?</a>
                                @endif
                            </div>

                            <!-- Submit button -->

                            <x-tw-elements.button type="submit" class="w-full" action="Sign In"/>
                        </x-slot>
                    </x-frontend.form-section>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
