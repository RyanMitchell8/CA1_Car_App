@props(['action', 'method', 'garage'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $garage->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Address</label>
        <input
            type="text"
            name="address"
            id="address"
            value="{{ old('address', $garage->address ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('address')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Garage Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($garage) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($garage->image)
        <div class="mb-4">
            <img src="{{ asset($garage->image) }}" alt="Garage Image" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($garage) ? 'Update Garage' : 'Add Garage' }}
        </x-primary-button>
    </div>
</form>
