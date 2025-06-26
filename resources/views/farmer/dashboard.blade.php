@extends('layouts.farmer')
@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-900 mb-6">Welcome, {{ Auth::user()->first_name }}</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @foreach ([['title' => 'My Products', 'count' => $productsCount, 'color' => 'blue'], ['title' => 'Agro-Inputs', 'count' => $inputsCount, 'color' => 'green'], ['title' => 'My Input Orders', 'count' => $ordersCount, 'color' => 'indigo']] as $card)
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
            <a href="{{ route('farmer.products.create') }}">
                <button class="bg-blue-500 text-white px-5 py-2 rounded-md shadow hover:bg-blue-600 transition cursor-pointer"><i
                    class="fa fa-plus"></i> Add Product</button>
            </a>

            <a href="{{ route('farmer.inputs.get_orders') }}">
                <button class="bg-green-500 text-white px-5 py-2 rounded-md shadow hover:bg-green-600 transition cursor-pointer"><i
                        class="fa fa-seedling"></i> Agro-Inputs Orders</button>
            </a>
        </div>

        <h2 class="text-lg font-semibold my-4 text-gray-800">My Products</h2>
           <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm">
                <thead class="bg-green-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="text-left px-4 py-3 border-b">#</th>
                        <th class="text-left px-4 py-3 border-b">Name</th>
                        <th class="text-left px-4 py-3 border-b">category</th>
                        <th class="text-left px-4 py-3 border-b">Available Quantity</th>
                        <th class="text-left px-4 py-3 border-b">Quantity type</th>
                        <th class="text-left px-4 py-3 border-b">Price</th>
                        <th class="text-left px-4 py-3 border-b">Status</th>
                        <th class="text-center px-4 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($products as $index => $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-b">{{ $product->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $product->category->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $product->quantity }}</td>
                            <td class="px-4 py-3 border-b">{{ $product->quantityType->name }}</td>
                            <td class="px-4 py-3 border-b">{{ $product->price }}</td>
                            <td class="px-4 py-3 border-b">
                                <span
                                    class="px-2 py-1 text-sm rounded-full
                        {{ $product->quantity > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $product->quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </td>
                            <td class="text-center px-4 py-3 border-b space-x-2">
                                <a href="{{ route('farmer.products.show', $product) }}">
                                    <button
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer">view</button>
                                </a>
                                <a href="{{ route('farmer.products.edit', $product) }}">
                                    <button
                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 cursor-pointer">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
