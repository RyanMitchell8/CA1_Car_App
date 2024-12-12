<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('All Garages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-black">
                    <h3 class="font-semibold text-lg text-white mb-4">List of Garges:</h3>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($garages as $garage)
                        <div class="flex flex-col">
                            <a href="{{ route('garages.show', $garage) }}">
                                <x-garage-card
                                    :name="$garage->name"
                                    :address="$garage->address"
                                    :image="$garage->image"
                                />
                            </a>
                            @if(Auth::user()->role === 'admin')
                                <div class="mt-2 flex space-x-2">
                                    <a href="{{ route('garages.edit', $garage) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('garages.destroy', $garage)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-alert-success>
    {{ session('success') }}
</x-alert-success>
