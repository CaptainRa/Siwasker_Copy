<div class="pl-4 md:ml-64 mt-6 w-3/6 h-auto pb-10">
    <span class="block text-3xl font-bold">{{$slot}}</span>
    <span class="block text-lg text-gray-500">Selamat Datang, {{ Auth::user()->name }}</span>
</div>