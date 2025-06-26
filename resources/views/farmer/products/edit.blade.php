@extends('layouts.farmer')
@section('title', 'Products')

@section('content')
 <div class="w-fit p-2 mb-2">
        <a href="{{route('farmer.products.index')}}"><i class="fa fa-arrow-left bg-green-500 text-white text-xl py-1 px-3 rounded-lg"></i></a>
    </div>

    <div class="w-full flex items-center justify-center">
        <div class="bg-white w-full mx-auto p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4"><i class="fa fa-plus"></i> Edit Product</h2>
            <form method="POST" action="{{ route('farmer.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <div class="flex flex-wrap box-border">
                        <div class="mb-4 w-full md:w-1/2 px-2">
                            <label class="block text-sm font-medium text-gray-700">Product name</label>
                            <input type="text" name="name"
                                class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500"
                                value="{{ $product->name }}"
                                >
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 w-full md:w-1/2 px-2 flex items-center">
                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" min=""
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500"
                                    value="{{ $product->quantity }}"
                                    >
                                @error('quantity')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <label class="block text-sm font-medium text-gray-700">Quantity Type</label>
                                <select name="quantity_type_id" class="w-full mt-1 p-2 border rounded-lg" >
                                    <option value="">Select quantity type</option>
                                    @foreach ($quantityTypes as $type)
                                        <option value="{{ $type->id }}" {{$type->id === $product->quantity_type_id ? 'selected' : ''}}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('quantity_type_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 w-full md:w-1/2 px-2">
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" class="w-full mt-1 p-2 border rounded-lg" >
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id === $product->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 w-full md:w-1/2 px-2">
                            <label class="block text-sm font-medium text-gray-700">Unit Price (Tzs)</label>
                            <input type="text" name="price" class="w-full mt-1 p-2 border rounded-lg" value="{{ $product->price }}" >
                            @error('price')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 w-full md:w-1/2 px-2">
                            <label class="block text-sm font-medium text-gray-700">Product Image</label>
                            <input type="file" name="image" id="product-image"
                                class="w-full mt-1 p-2 border rounded-lg" accept="image/*"
                                onchange="previewImage(event)">
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <!-- Preview -->
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image"
                                    class="w-full h-80 object-center rounded-lg border" />
                            </div>
                        </div>


                        <div class="mb-4 w-full md:w-1/2 px-2">
                            <label class="block text-sm font-medium text-gray-700">Product description</label>
                            <textarea name="description" class="w-full mt-1 p-2 border rounded-lg" >
                                {{ $product->description }}
                            </textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 cursor-pointer">Save
                            Product</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
