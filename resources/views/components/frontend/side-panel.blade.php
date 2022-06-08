<div class="lg:w-72 w-full">


    <h3 class="text-xl font-semibold"> You may know </h3>

    <div class="p-1" uk-sticky="offset:80">

        <div class="contact-list">

            <a href="#">
                <div class="contact-avatar">
                    <img src="{{ asset('assets/images/avatars/avatar-1.jpg')}}" alt="">
                    <span class="user_status status_online"></span>
                </div>
                <div class="contact-username"> Dennis Han</div>
            </a>
            <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                <div class="contact-list-box">
                    <div class="contact-avatar">
                        <img src="{{('assets/images/avatars/avatar-2.jpg')}}" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                    <p>
                        <ion-icon name="people" class="text-lg mr-1"></ion-icon>
                        Become friends with
                        <strong> Stella Johnson </strong>
                    </p>
                    <div class="contact-list-box-btns">
                        <button type="button" class="button primary flex-1 block mr-2">
                            <i class="uil-envelope mr-1"></i> Send Friend Request
                        </button>
                    </div>
                </div>
            </div>


        </div>


    </div>

</div>
