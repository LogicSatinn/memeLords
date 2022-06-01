<!--  breadcrumb -->
<div class="breadcrumb-area py-0">
    <div class="breadcrumb">
        <ul class="m-0">
            <li>
                <a href="{{ route('topics.index') }}">Topics</a>
            </li>
            <li class="active">
                <a href="#">Create New Topic </a>
            </li>
        </ul>
    </div>
</div>

<x-frontend.form-section action="{{ route('topics.store') }}" enctype="multipart/form-data" >
    <x-slot:form>
        <!-- create page-->
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">

            <!-- form header -->
            <div class="text-center border-b border-gray-100 py-6">
                <h3 class="font-bold text-xl"> Create New Topic </h3>
            </div>

            <!-- form body -->
            <div class="p-10 space-y-7">

                <div class="line">
                    <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);"
                           value="" autocomplete="off">
                    <span for="name" class="line__placeholder"> Topic Name </span>
                </div>

                <div>
                    <label for="category" class="font-semibold text-base"> Topic Category </label>
                    <select id="category" name="category" class="shadow-none selectpicker with-border">
                        <option value="Technology">Technology</option>
                        <option value="Cars and Vehicles">Cars and Vehicles</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Economics and Trade">Economics and Trade</option>
                        <option value="Education">Education</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Movies & Animation">Movies & Animation</option>
                        <option value="Gaming">Gaming</option>
                        <option value="History and Facts">History and Facts</option>
                        <option value="LifeStyle">LifeStyle</option>
                        <option value="Other">Other</option>
                    </select>
                </div>


                <div class="px-2 space-y-2">
                    <label for="visibility" class="font-semibold text-base"> Choose Privacy </label>
                    <div> Anyone can see who's in the group and what they post.</div>
                    <select id="visibility" name="visibility" class="shadow-none selectpicker with-border">
                        <option data-icon="uil-globe" value="Public" selected>Public</option>
                        <option data-icon="uil-bullseye" value="Private"> Private</option>
                        <option data-icon="uil-chat-bubble-user" value="Following">Following</option>
                    </select>
                </div>

                <div class="line h-32">
            <textarea class="line__input h-32" id="description" name="description" type="text"
                      onkeyup="this.setAttribute('value', this.value);" value="description" autocomplete="off"></textarea>
                    <span for="description" class="line__placeholder"> Topic description </span>
                </div>

                <div uk-form-custom class="w-full py-3">
                    <div class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" name="cover_image">
                </div>

            </div>

            <!-- form footer -->
            <div class="flex justify-center border-gray-100 py-8">
                <button type="submit" class="button lg:w-1/3">
                    Create Now
                </button>
            </div>

        </div>
    </x-slot:form>
</x-frontend.form-section>
