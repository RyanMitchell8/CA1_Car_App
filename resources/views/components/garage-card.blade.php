@props(['name', 'address', 'image'])
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <img src="{{asset( 'images/garages/' . $image)}}" alt="{{$name}}">
    <p class="text-gray-600">{{$address}}</p>
</div>