<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-screen bg-gray-50 text-gray-800">
    <!-- Sidebar -->
    <aside
        class="w-full lg:w-2/12 fixed top-0 left-0 h-full bg-green-100 shadow-lg px-6 py-6 hidden lg:flex flex-col justify-between border-r border-gray-200">
        <div>
            <div class="w-full text-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-28 h-28 mx-auto">
                <h2 class="text-xl font-bold text-green-700 text-center">Agri-Market</h2>
            </div>
            <nav class="space-y-3">
                <a href="{{ route('farmer.dashboard') }}"
                    class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-house"></i> <span>Dashboard</span></a>

                <a href="{{route('farmer.profile.index')}}"
                    class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-user"></i> <span>Profile</span></a>

                <a href="{{ route('farmer.products.index') }}"
                    class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition"><i
                        class="fa fa-leaf"></i>My Products</a>

                <div class="space-y-1" id="sidebarMenu">
                    <!-- Parent Menu (Toggle Trigger) -->
                    <button onclick="toggleSidebarMenu()"
                        class="flex items-center w-full justify-between py-2 px-4 rounded-lg hover:bg-green-200 transition text-left">
                        <span class="flex items-center gap-2">
                            <i class="fa fa-seedling"></i>
                            Agro-Inputs
                        </span>
                        <svg id="dropdownIcon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Submenu (Collapsible) -->
                    <div id="subMenu" class="ml-6 mt-1 space-y-1 hidden ">
                        <a href="{{ route('farmer.inputs.index') }}"
                            class="block px-4 py-2 text-sm rounded-md hover:text-green-600">
                            Browse Inputs
                        </a>
                        <a href="{{ route('farmer.inputs.get_orders') }}"
                            class="block px-4 py-2 text-sm rounded-md hover:text-green-600">
                            My Orders
                        </a>
                    </div>
                </div>
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
    <main class="w-full lg:w-10/12 float-right">
        <div class="w-full bg-green-100 text-green-700 px-4 py-6 sticky top-0">
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

    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
        @endif
    </script>

    <script>
        function toggleSidebarMenu() {
            const subMenu = document.getElementById('subMenu');
            const icon = document.getElementById('dropdownIcon');

            if (subMenu.classList.contains('hidden')) {
                subMenu.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                subMenu.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
</body>

</html>
