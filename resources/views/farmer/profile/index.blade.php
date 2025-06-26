@extends('layouts.farmer')
@section('title', 'Profile')

@section('content')

    <div class="w-full md:w-10/12 mx-auto px-4 py-2">
        <div class="mt-10 bg-gray-50 border border-gray-200 rounded-xl shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4"><i class="fa fa-user"></i> Profile Information</h2>

            <div class="flex items-center gap-4 mb-6">
                <div>
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->first_name }} {{ $user->last_name }}"
                        class="w-24 h-24 rounded-full border border-gray-300 shadow-md mb-4">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                    <p><strong>Location:</strong> {{ $user->location }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>

            <div class="my-2">
                <button onclick="openRefillModal()"
                    class="mt-6 px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 cursor-pointer">
                    Edit Profile
                </button>
            </div>

            <!-- Edit Profile Modal -->
            <div id="refillModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
                <div class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold mb-4">Update Profile information</h2>
                    <form method="POST" action="{{ route('farmer.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" name="first_name" value="{{ $user->first_name }}" required
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" name="last_name" value="{{ $user->last_name }}" required
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" value="{{ $user->location }}" required
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" required
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                                <input type="file" name="photo" accept="image/*"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" onclick="closeRefillModal()"
                                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 cursor-pointer">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
