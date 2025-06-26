@extends('layouts.farmer')
@section('title', 'Input Details')

@section('content')
    <div class="w-full md:w-10/12 mx-auto px-4 py-2">
        <div class="w-fit p-2 mb-2">
            <a href="{{ route('farmer.inputs.index') }}"><i
                    class="fa fa-arrow-left bg-green-500 text-white text-xl py-1 px-3 rounded-lg"></i></a>
        </div>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2 w-full">
                <img src="{{ asset('storage/' . $input->photo) }}" alt="{{ $input->name }}"
                    class="w-full h-80 object-cover rounded-xl shadow-md border border-gray-200">
            </div>

            <!-- Input Info -->
            <div class="md:w-1/2 w-full bg-white rounded-xl shadow p-6 space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $input->name }}</h1>

                <p class="text-green-600 font-bold text-xl">Tsh {{ number_format($input->price, 0) }}</p>
                <p class="text-gray-700 text-sm">Available Quantity: <strong>{{ $input->quantity }}</strong> units</p>

                @if ($input->description)
                    <p class="text-gray-600 text-sm">{{ $input->description }}</p>
                @endif

                <button id="openModalBtn" class="mt-6 px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                    Request This Input
                </button>

                <!-- Modal -->
                <div id="requestModal" class="fixed inset-0 bg-black/50 z-40 hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 space-y-4 relative">
                            <!-- Close Button -->
                            <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                                ✕
                            </button>

                            <h2 class="text-xl font-semibold text-gray-800">Request Input</h2>

                            <form method="POST" action="{{ route('farmer.inputs.place_order') }}">
                                @csrf
                                <input type="hidden" name="input_id" value="{{ $input->input_id }}">
                                <input type="hidden" name="supplier_id" value="{{ $input->supplier->id }}">
                                <input type="hidden" name="price" id="price" value="{{ $input->price }}">

                                <!-- Quantity Input -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Quantity (units)</label>
                                    <input type="number" id="quantityInput" name="quantity" min="1"
                                        max="{{ $input->quantity }}" class="mt-1 block w-full border rounded-lg px-3 py-2"
                                        value="1" required>
                                </div>

                                <!-- Total Price -->
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">
                                        <strong>Total Price:</strong>
                                        <span class="text-green-600 font-bold">Tsh
                                            <span id="totalPrice">{{ $input->price }}</span>
                                        </span>
                                    </p>
                                </div>

                                <div class="mt-4 flex justify-end space-x-2">
                                    <button type="button" id="cancelModalBtn"
                                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                                        Place Order
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Supplier Info -->
        <div class="mt-10 bg-gray-50 border border-gray-200 rounded-xl shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4"><i class="fa fa-user"></i> Supplier Information</h2>

            <div class="flex items-center gap-4 mb-6">
                <div>
                    <img src="{{ asset('storage/' . $input->supplier->photo) }}"
                        alt="{{ $input->supplier->first_name }} {{ $input->supplier->last_name }}"
                        class="w-24 h-24 rounded-full border border-gray-300 shadow-md mb-4">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <p><strong>Name:</strong> {{ $input->supplier->first_name }} {{ $input->supplier->last_name }}</p>
                    <p><strong>Location:</strong> {{ $input->supplier->location }}</p>
                    <p><strong>Phone:</strong> {{ $input->supplier->phone }}</p>
                    <p><strong>Email:</strong> {{ $input->supplier->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('requestModal');
            const openBtn = document.getElementById('openModalBtn');
            const closeBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelModalBtn');
            const quantityInput = document.getElementById('quantityInput');
            const totalPrice = document.getElementById('totalPrice');
            const price = document.getElementById('price');
            const unitPrice = {{ $input->price }};

            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            cancelBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Live total price update
            quantityInput.addEventListener('input', () => {
                const qty = parseInt(quantityInput.value) || 0;
                totalPrice.innerText = qty * unitPrice;
                price.value = qty * unitPrice;
            });
        });
    </script>
@endsection
