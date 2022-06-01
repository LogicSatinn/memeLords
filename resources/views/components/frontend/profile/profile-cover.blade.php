<div class="profile user-profile">

    <div class="profiles_banner">
        <img src="{{ asset('assets/images/avatars/profile-cover.jpg')}}" alt="">
        <div class="profile_action absolute bottom-0 right-0 space-x-1.5 p-3 text-sm z-50 hidden lg:flex">
            <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                <ion-icon name="crop-outline" class="text-xl"></ion-icon>
                <span> Crop  </span>
            </a>
            <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                <ion-icon name="create-outline" class="text-xl"></ion-icon>
                <span> Edit </span>
            </a>
        </div>
    </div>
    <div class="profiles_content">

        <div class="profile_avatar">
            <div class="profile_avatar_holder">
                <img src="{{ asset('assets/images/avatars/avatar-8.jpg')}}" alt="">
            </div>
            <div class="user_status status_online"></div>
            <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
        </div>

        <div class="profile_info">
            <h1> Josephine Williams </h1>
            <p> Family , Food , Fashion , Fourever <a href="#">Edit </a></p>
        </div>

    </div>

    <div class="flex justify-between lg:border-t border-gray-100 flex-col-reverse lg:flex-row pt-2">
        <nav class="responsive-nav pl-3">
            <ul  uk-switcher="connect: #timeline-tab; animation: uk-animation-fade">
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>

        <!-- button actions -->
        <div class="flex items-center space-x-1.5 flex-shrink-0 pr-4 mb-2 justify-center order-1 relative">

            <!-- add story -->
            <a href="#" class="flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white"  uk-toggle="target: #create-post-modal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                </svg>
                <span> Add Your Story </span>
            </a>

            <a href="#offcanvas-create" uk-toggle class="flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white">
                <span class="md:block hidden"> Edit Profile </span>
            </a>

            <!-- more icon -->
            <a href="#" class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100">
                <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
            </a>
            <!-- more drowpdown -->
            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                 uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                            <ion-icon name="notifications-off-outline" class="pr-2 text-lg"></ion-icon>   Disable notifications
                        </a>
                    </li>
                    <li>
                        <hr class="-mx-2 my-2 dark:border-gray-800">
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-50 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                            <ion-icon name="stop-circle-outline" class="pr-2 text-xl"></ion-icon>  Delete Account
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</div>
