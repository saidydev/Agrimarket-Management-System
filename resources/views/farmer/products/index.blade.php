@extends('layouts.farmer')
@section('title', 'Products')
@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Products Management</h1>
    <div class="bg-white p-6 rounded-xl shadow-md mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Available Products Stock</h2>
            <a href="{{ route('farmer.products.create') }}">
                <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition cursor-pointer">
                    <i class="fa fa-plus"></i> Add Product
                </button>
            </a>
        </div>

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
        <div class="w-full my-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
