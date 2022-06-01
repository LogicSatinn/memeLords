@props(['topic'])

<div class="card p-4 mb-5">

    <h1 class="block text-lg font-bold"> About </h1>

    <div class="space-y-4 mt-3">

        <div class="flex items-center space-x-3">
            <ion-icon name="people" class="bg-gray-100 p-2 rounded-full text-2xl" role="img" aria-label="people"></ion-icon>
            <div class="flex-1">
                <div class="font-semibold">  12 Members </div>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <ion-icon name="globe-outline" class="bg-gray-100 p-2 rounded-full text-2xl" role="img" aria-label="people"></ion-icon>
            <div class="flex-1">
                <div class="font-bold"> {{ $topic->visibility }} </div>
                <div> Anyone can see who's in the group and what they post. </div>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <ion-icon name="albums" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
            <div class="flex-1">
                <div class="font-bold"> {{ $topic->category }} </div>
            </div>
        </div>

    </div>

</div>
