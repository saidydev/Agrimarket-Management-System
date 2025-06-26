@extends('layouts.farmer')
@section('title', 'Orders')
@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Orders Management</h1>
    <div class="bg-white p-6 rounded-xl shadow-md mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">List of orders grouped by supplier and product</h2>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm">
                <thead class="bg-green-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="text-left px-4 py-3 border-b">#</th>
                        <th class="text-left px-4 py-3 border-b">Supplier</th>
                        <th class="text-left px-4 py-3 border-b">Input</th>
                        <th class="text-center px-4 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($groupOrders as $index => $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->supplier->first_name }}
                                {{ $order->supplier->last_name }}</td>
                            <td class="px-4 py-3 border-b">{{ $order->input->name }}</td>
                            <td class="text-center px-4 py-3 border-b space-x-2">
                                <a
                                    href="{{ route('farmer.inputs.get_orders_history', ['supplier' => $order->supplier_id, 'input' => $order->input_id]) }}">
                                    <button
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer">view
                                        orders</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full my-4">
            {{ $groupOrders->links() }}
        </div>
    </div>
@endsection
