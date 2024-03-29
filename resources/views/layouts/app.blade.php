<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/location.png" type="image/x-icon">

    <!-- Import css -->
    @vite(['resources/css/app.css', 'resources/css/style.css'])

    <!-- Font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>

    <!-- Sweetalert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Ckeditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        } */

        .bg-sidebar {
            background: #1F2937;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        /* .upgrade-btn:hover {
            background: #0038fd;
        } */

        .active-nav-link {
            background: #0038fd;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 krub-font flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a class="flex items-center justify-center dancing-script tracking-wide no-underline hover:no-underline font-bold text-white text-4xl "
                href="{{ route('admin/home') }}">
                CafeHeal
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('admin/home') }}" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                แดชบอร์ด
            </a>
            <a href="{{ route('admin/cafe') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                ข้อมูลร้านคาเฟ่
            </a>
            <a href="{{ route('admin/cafe-service') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                บริการของร้านคาเฟ่
            </a>
            <a href="{{ route('admin/service') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                ข้อมูลบริการ
            </a>
            <a href="{{ route('admin/user') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                ข้อมูลผู้ใช้
            </a>
        </nav>
        <div
            class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            &copy; 2024 CafeHeal
        </div>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-4 px-6 hidden sm:flex">
            {{-- <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">ข้อมูลผู้ใช้</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 account-link hover:text-white">ออกจากระบบ</a>
                </div>
            </div> --}}
            <div class="w-1/2"></div>
            <div class="relative w-1/2 flex justify-end">
                <div class="dropdown dropdown-end">
                    <div class="flex gap-2 text-black hover:text-blue-500 cursor-pointer" tabindex="0" role="button">
                        <span class="pl-5 inline-block no-underline text-black">สวัสดี,
                            {{ Auth::user()->name }}</span>
                        <button class="text-black">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-sm w-52">
                        <li><a><i class="fas fa-user mr-3 text-blue-500"></i> บัญชีผู้ใช้</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="logoutConfirm(event)">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-3 text-error"></i> ออกจากระบบ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a class="flex items-center justify-center dancing-script tracking-wide no-underline hover:no-underline font-bold text-white text-4xl "
                    href="{{ route('admin/home') }}">
                    CafeHeal
                </a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ route('admin/home') }}" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    แดชบอร์ด
                </a>
                <a href="{{ route('admin/cafe') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    ข้อมูลร้านคาเฟ่
                </a>
                <a href="{{ route('admin/cafe-service') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    บริการของร้านคาเฟ่
                </a>
                <a href="{{ route('admin/service') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    ข้อมูลบริการ
                </a>
                <a href="{{ route('admin/user') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    ข้อมูลผู้ใช้
                </a>
                <a href="{{ route('logout') }}" onclick="logoutConfirm(event)"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    ออกจากระบบ
                </a>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="flex flex-col w-full h-full overflow-y-scroll px-4 py-8">
            <div>@yield('contents')</div>
        </div>
    </div>

    <script>
        window.logoutConfirm = function(event) {
            event.preventDefault();

            Swal.fire({
                title: "แจ้งเตือน",
                text: "ต้องการออกจากระบบหรือไม่?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ตกลง",
                cancelButtonText: "ยกเลิก",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to logout route
                    window.location.href = event.target.href;
                }
            });
        }
    </script>

</body>

</html>
