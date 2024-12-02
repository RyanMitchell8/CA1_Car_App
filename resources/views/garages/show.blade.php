<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Garages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-red-800">
                    <h3 class="font-semibold text-lg text-white mb-4">List of Garages:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($garages as $garage) <!-- Use the correct variable name -->
                        <div class="flex flex-col">
                            <a href="{{ route('garages.show', $garage) }}">
                                <x-garage-card
                                    :name="$garage->name"
                                    :address="$garage->address"
                                    :image="$garage->image"
                                />
                            </a>
                            <!-- Display the cars for this garage -->
                            @if($garage->cars->isNotEmpty()) <!-- Check if the garage has cars -->
                                <h4 class="mt-4 font-semibold text-md">Cars:</h4>
                                <ul class="list-disc ml-6">
                                    @foreach($garage->cars as $car)
                                    <li>
                                        {{ $car->model }} ({{ $car->year }})  <!-- Display car model and year -->
                                    </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No cars in this garage.</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
