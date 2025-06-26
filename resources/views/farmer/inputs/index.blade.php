@extends('layouts.farmer')
@section('title', 'Inputs')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Available Agricultural Inputs</h1>

        @if ($inputs->isEmpty())
            <div class="text-gray-500">No inputs available right now.</div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($inputs as $input)
                    @if ($input->quantity > 0)
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition duration-300">
                            <img src="{{ asset('storage/' . $input->photo) }}" alt="{{ $input->name }}"
                                class="w-full h-48 object-cover rounded-t-xl">

                            <div class="p-4 space-y-2">
                                <h2 class="text-xl font-semibold text-gray-900">{{ $input->name }}</h2>

                                <p class="text-green-600 font-bold text-lg">Tsh {{ number_format($input->price, 0) }}</p>

                                <p class="text-sm text-gray-600">
                                    Available: <span class="font-semibold">{{ $input->quantity }}</span> units
                                </p>

                                <div class="mt-4">
                                    <a href="{{ route('farmer.inputs.show', $input) }}"
                                        class="inline-block px-4 py-2 bg-emerald-600 text-white text-sm rounded-md hover:bg-emerald-700 transition">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-8">
                {{ $inputs->links() }}
            </div>
        @endif
    </div>
@endsection
