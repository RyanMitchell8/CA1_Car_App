<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Garages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-black">
                    <h3 class="font-semibold text-lg text-white mb-4">{{$garage->name}}</h3>

                    <div class="mb-5">
                        <a href="{{ route('garages.show', $garage) }}">
                            <x-garage-card
                                :name="$garage->name"
                                :address="$garage->address"
                                :image="$garage->image" />
                        </a>
                    </div>

                    <h4 class="mt-4 font-semibold text-md text-2xl text-white mb-5">Cars:</h4>
                    <div class="flex flex-wrap w-full justify-between">

                        <!-- $garage->cars()->get(); -->
                        <!-- Display the cars for this garage -->
                        @if($garage->cars()->get()->isNotEmpty()) <!-- Check if the garage has cars -->
                        
                        @foreach($garage->cars()->get() as $car)

                        <div class="flex flex-col mb-5">
                            <a href="{{ route('cars.show', $car) }}">
                                <x-car-card
                                    :model="$car->model"
                                    :type="$car->type"
                                    :image_url="$car->image_url"
                                    :year="$car->year"
                                    class="hover:bg-gray-300 text-black" />
                            </a>
                            <div class="mt-2 flex space-x-2">
                                <a href="{{ route('cars.edit', $car) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('cars.destroy', $car)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p>No cars in this garage.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>