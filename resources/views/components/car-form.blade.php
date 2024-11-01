@props(['action', 'method'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Model Input -->
    <div class="mb-4">
        <label for="model" class="block text-sm text-gray-700">Model</label>
        <input type="text" name="model" id="model" value="{{ old('model', $car->model ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('model')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Type of Car Input -->
    <div class="mb-4">
        <label for="type" class="block text-sm text-gray-700">Type of Car</label>
        <input type="text" name="type" id="type" value="{{ old('type', $car->type ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('type')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Year of Car Input -->
    <div class="mb-4">
        <label for="year" class="block text-sm text-gray-700">Year of Car</label>
        <input type="number" name="year" id="year" value="{{ old('year', $car->year ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Car Image Input -->
    <div class="mb-4">
        <label for="image_url" class="block text-sm font-medium text-gray-700">Car Image</label>
        <input type="file" name="image_url" id="image_url" {{ isset($car) ? '' : 'required' }} class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('image_url')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Existing Image (if available) -->
    @isset($car->image_url)
    <div class="mb-4">
        <img src="{{ asset($car->image_url) }}" alt="Car Image" class="w-24 h-32 object-cover">
    </div>
    @endisset

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($car) ? 'Update Car' : 'Add Car' }}
        </x-primary-button>
    </div>
</form>
