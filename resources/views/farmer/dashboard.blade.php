@extends('layouts.farmer')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-900 mb-6">Welcome, John</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        @foreach ([['title' => 'Total Students', 'count' => 320, 'color' => 'blue'], ['title' => 'Allocated Rooms', 'count' => 250, 'color' => 'green'], ['title' => 'Available Rooms', 'count' => 70, 'color' => 'indigo'], ['title' => 'Pending Complaints', 'count' => 12, 'color' => 'red']] as $card)
            <div class="bg-white p-5 rounded-xl shadow-md border-l-4 border-{{ $card['color'] }}-500">
                <h2 class="text-sm text-gray-500">{{ $card['title'] }}</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $card['count'] }}</p>
            </div>
        @endforeach
    </div>

    <!-- Quick Actions -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Quick Actions</h2>
        <div class="flex flex-wrap gap-4">
            <button class="bg-blue-500 text-white px-5 py-2 rounded-md shadow hover:bg-blue-600 transition">Allocate
                Room</button>
            <button class="bg-green-500 text-white px-5 py-2 rounded-md shadow hover:bg-green-600 transition">View
                Complaints</button>
            <button class="bg-purple-500 text-white px-5 py-2 rounded-md shadow hover:bg-purple-600 transition">Generate
                Report</button>
        </div>
    </div>
@endsection
