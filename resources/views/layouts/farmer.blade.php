<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Farmer Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="flex h-screen bg-gray-50 text-gray-800">
    <!-- Sidebar -->
    <aside class="w-64 bg-green-100 shadow-lg px-6 py-6 flex flex-col justify-between border-r border-gray-200">
        <div>
            <div class="w-full text-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-28 h-28 mx-auto">
                <h2 class="text-xl font-bold text-green-700 text-center">Agri-Market</h2>
            </div>
            <nav class="space-y-3">
                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-house"></i> <span>Dashboard</span></a>

                <div class="dropdown-menu">
                    <button
                        class="dropdown-toggle w-full flex items-center justify-between px-4 py-2 hover:bg-green-100">
                        <span class="flex items-center gap-2">
                            <i class="fa fa-leaf"></i> Products
                        </span>
                        <i class="fa fa-chevron-down transition-transform duration-300"></i>
                    </button>

                    <div
                        class="dropdown-content overflow-hidden max-h-0 transition-all duration-300 ease-in-out bg-green-100 px-6 text-sm text-gray-700 space-y-1">
                        <a href="#" class="block py-1 hover:text-green-600">Create Product</a>
                        <a href="{{route('farmer.products.index')}}" class="block py-1 hover:text-green-600">View Stock</a>
                    </div>
                </div>

                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-building"></i> Hostels</a>
                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-calendar"></i> Allocation</a>
                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-chart-bar"></i> Reports</a>
            </nav>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full mt-6 py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition cursor-pointer">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </aside>

    <!-- Main content -->
    <main class="w-full">
        <div class="w-full bg-green-100 text-green-700 px-4 py-6">
            <h1 class="text-3xl font-semibold">Agri-Market Management System</h1>
        </div>
        <div class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </div>
    </main>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownToggles = document.querySelectorAll(".dropdown-toggle");

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener("click", function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector("i");

                    if (content.classList.contains("max-h-0")) {
                        content.classList.remove("max-h-0");
                        content.classList.add("max-h-96");
                        icon.classList.add("rotate-180");
                    } else {
                        content.classList.remove("max-h-96");
                        content.classList.add("max-h-0");
                        icon.classList.remove("rotate-180");
                    }
                });
            });
        });
    </script>

</body>

</html>
