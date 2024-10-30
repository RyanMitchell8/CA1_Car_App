<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black bg-blue-500 leading-tight">
        {{ __('All Cars') }}
        </h2>
    </x-slot>
 
    <div class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-200">
                    <h3 class="font-semibold text-lg mb-4">List of Cars:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($cars as $car)
                        <a href="{{ route('cars.show', $car) }}">
                            <x-car-card
                                :model="$car->model"
                                :type="$car->type"
                                :image_url="$car->image_url"
                                :year="$car->year"
                                class="bg-blue-500 hover:bg-blue-600 text-black"
                            />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-alert-success>
    {{session('success')}}
</x-alert-success>
 