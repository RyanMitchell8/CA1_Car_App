<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Create New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-ww-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-red-700">
                    <h3 class="font-semibold text-lg mb-4">Edit New Car:</h3>
                    <x-car-form
                        :action="route('cars.update', $car)"
                        :method="'PUT'"
                        :car="$car"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
