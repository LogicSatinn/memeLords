<div class="lg:w-2/3">
    <div class="flex justify-between items-center relative md:mb-4 mb-3">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold"> Friends </h2>
            <nav class="responsive-nav border-b md:m-0 -mx-4">
                <ul>
                    <li class="active"><a href="#" class="lg:px-2"> My Friends </a></li>

                </ul>
            </nav>
        </div>
    </div>

    {{ $myFriends }}

    <br>

    <div class="my-2 flex items-center justify-between pb-3">
        <div>
            <h2 class="text-xl font-semibold"> Your Friends also following</h2>
        </div>
{{--        <a href="#" class="text-blue-500"> See all </a>--}}
    </div>

    {{ $mutualFriends }}


</div>
