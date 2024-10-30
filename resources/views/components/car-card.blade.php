@props(['model', 'type', 'year', 'image_url'])

<div {{ $attributes->merge(['class' => 'border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300']) }}>
    
    <h4 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{$model}}</h4>

    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/cars/' . $image_url) }}" alt="{{$model}}" class="w-full max-w-xs h-auto object-cover">
    </div>

    <p class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">Year Of Car: ({{$year}})</p>

    <p class="text-gray-800 mt-4" style="font-size: 1rem;">Type: {{$type}}</p>
</div>
