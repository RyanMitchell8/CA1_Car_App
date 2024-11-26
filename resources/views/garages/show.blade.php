<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('All Garages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-red-800">
                    <h3 class="font-semibold text-lg mb-4">List of Garges:</h3>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="flex flex-col">
                            <a href="{{ route('garages.show', $garage) }}">
                                <x-garage-card
                                    :name="$garage->name"
                                    :address="$garage->address"
                                    :image="$garage->image"
                                />
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>