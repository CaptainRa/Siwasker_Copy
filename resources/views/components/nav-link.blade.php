@props(['active' => false])

<a {{$attributes}}
    class="flex items-center p-2 text-base font-normal rounded-lg group 
    {{ $active ? 'bg-white text-black' : 'text-white hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white' }}">
    <span class="{{ $active ? 'text-black' : 'text-white group-hover:text-black' }}">{{$slot}}</span>
</a>