@extends('layouts.farmer')
@section('title', 'Input Order')

@section('content')
    <div class="w-full md:w-10/12 mx-auto px-4">
        <div class="w-fit p-2 mb-2">
            <a href="{{ route('farmer.inputs.get_orders') }}"><i
                    class="fa fa-arrow-left bg-green-500 text-white text-xl py-1 px-3 rounded-lg"></i></a>
        </div>

        <!-- Supplier Info -->
        <div class="mt-2 mb-4 bg-gray-50 border border-gray-200 rounded-xl shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4"><i class="fa fa-user"></i> Supplier Information</h2>

            <div class="flex items-center gap-4 mb-6">
                <div>
                    <img src="{{ asset('storage/' . $supplier->photo) }}"
                        alt="{{ $supplier->first_name }} {{ $supplier->last_name }}"
                        class="w-24 h-24 rounded-full border border-gray-300 shadow-md mb-4">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <p><strong>Name:</strong> {{ $supplier->first_name }} {{ $supplier->last_name }}</p>
                    <p><strong>Location:</strong> {{ $supplier->location }}</p>
                    <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
                    <p><strong>Email:</strong> {{ $supplier->email }}</p>
                </div>
            </div>
        </div>

        {{-- orders --}}

            <h2 class="text-xl font-semibold my-2">Order History</h2>
         <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm">
                <thead class="bg-green-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="text-left px-4 py-3 border-b">#</th>
                        <th class="text-left px-4 py-3 border-b">Input Name</th>
                        <th class="text-left px-4 py-3 border-b">Quantity</th>
                        <th class="text-left px-4 py-3 border-b">Price</th>
                        <th class="text-center px-4 py-3 border-b">Date Ordered</th>
                        <th class="text-left px-4 py-3 border-b">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($orders as $index => $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->input->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->quantity }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->price }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->created_at }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full my-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
