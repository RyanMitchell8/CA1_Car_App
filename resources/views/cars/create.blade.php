<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Create New Car') }}
        </h2>
    </x-slot>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Car:</h3>
                            <x-car-form
                                :action="route('cars.store')"
                                :method="'POST'"
                            />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>