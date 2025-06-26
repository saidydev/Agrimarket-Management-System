@extends('layouts.farmer')
@section('title', 'Products')

@section('content')
    <div class="w-full md:w-10/12 mx-auto px-4 py-2">
        <div class="w-fit p-2 mb-2">
            <a href="{{ route('farmer.products.index') }}"><i
                    class="fa fa-arrow-left bg-green-500 text-white text-xl py-1 px-3 rounded-lg"></i></a>
        </div>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2 w-full">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                    class="w-full h-96 object-center rounded-xl shadow-md border border-gray-200">
            </div>

            <div class="md:w-1/2 w-full bg-white rounded-xl shadow p-6 space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>

                <p class="text-gray-700 text-sm">
                    {{ $product->description ?? 'No description provided for this product.' }}
                </p>

                <div class="space-y-2 text-gray-800">
                    <p><span class="font-semibold">Unit Price:</span> <span class="text-green-600 font-bold">Tsh
                            {{ number_format($product->price, 0) }}</span></p>
                    <p><span class="font-semibold">Available Stock:</span> {{ $product->quantity }}
                        {{ $product->quantityType->name }}</p>
                    @if ($product->category)
                        <p><span class="font-semibold">Category:</span> {{ $product->category->name }}</p>
                    @endif
                    <p><span class="font-semibold">Status:</span>
                        <span
                            class="px-2 py-1 text-sm rounded-full
                        {{ $product->quantity > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $product->quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-6">
                    <button onclick="openRefillModal()"
                        class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <i class="fa fa-leaf"></i> Refill stock
                    </button>

                    <a href="{{ route('farmer.products.edit', $product) }}"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fa fa-pencil"></i> Edit Product
                    </a>

                    <form action="{{ route('farmer.products.destroy', $product) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Refill Stock Modal -->
        <div id="refillModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
            <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Refill Stock</h2>
                <form action="{{ route('farmer.products.refill', $product) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Stock Amount
                            ({{ $product->quantityType->name }})</label>
                        <input type="number" name="quantity" min="1" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeRefillModal()"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- stock History --}}
        {{-- <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4"><i class="fa fa-bar-chart"></i> Stock History</h2>
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-sm text-gray-500">This section will list all stock updates made to this product.</p>
            </div>
        </div> --}}
    </div>

    <script>
        function openRefillModal() {
            document.getElementById('refillModal').classList.remove('hidden');
        }

        function closeRefillModal() {
            document.getElementById('refillModal').classList.add('hidden');
        }
    </script>
@endsection
