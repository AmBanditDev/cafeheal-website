<!DOCTYPE html>
<html lang="en" data-theme="bumblebee">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/assets/location.png" type="image/x-icon">
    {{-- import css --}}
    @vite(['resources/css/app.css', 'resources/css/style.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet">

    <!-- Sweetalert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="bg-white text-gray-600 krub-font leading-normal text-base tracking-normal">
    <div>
        <!--Navbar -->
        <nav id="header" class="w-full z-30 top-0 py-1 bg-gray-800">
            <div class="max-w-7xl container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

                <div class="order-1">
                    <a class="flex items-center dancing-script tracking-wide no-underline hover:no-underline font-bold text-white text-4xl "
                        href="{{ route('home') }}">
                        Cafe
                        <img src="/assets/location.png" alt="" style="width: 40px">
                        Heal
                    </a>
                </div>

                <label for="menu-toggle" class="cursor-pointer md:hidden block order-2">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" viewBox="0 0 20 20">
                        <title>menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </label>

                <input class="hidden" type="checkbox" id="menu-toggle" />

                <div class="hidden md:flex md:items-center md:w-auto w-full order-2" id="menu">
                    <nav>
                        <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                            <li>
                                <a class="inline-block no-underline text-gray-300 hover:text-white py-2 px-4"
                                    href="{{ route('home') }}">หน้าแรก</a>
                            </li>
                            <li>
                                <a class="inline-block no-underline text-gray-300 hover:text-white py-2 px-4"
                                    href="{{ route('about') }}">เกี่ยวกับเรา</a>
                            </li>
                            <li>
                                <a class="inline-block no-underline text-gray-300 hover:text-white py-2 px-4"
                                    href="{{ route('all-cafe') }}">
                                    <span>ร้านคาเฟ่ทั้งหมด</span>
                                </a>
                            </li>
                            <li>
                                <div class="inline-block">
                                    <a class="flex no-underline text-gray-300 hover:text-white py-2 px-4"
                                        href="{{ route('search') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                        <span class="pl-1">ค้นหา</span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                @if (!Auth::check())
                                    <a class="inline-block no-underline text-gray-300 hover:text-white py-2 px-4"
                                        href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                        </svg>
                                        <span class="pl-1">เข้าสู่ระบบ</span>
                                    </a>
                                @else
                                    <div class="dropdown dropdown-start lg:dropdown-end py-2">
                                        <div class="flex gap-2 text-gray-300 hover:text-white cursor-pointer"
                                            tabindex="0" role="button">
                                            <span class="pl-5 inline-block no-underline text-gray-300">สวัสดี,
                                                {{ Auth::user()->name }}</span>
                                            <button class="text-gray-300">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </button>
                                        </div>
                                        <ul tabindex="0"
                                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-sm w-52">
                                            <li><a><i class="fas fa-user mr-3"></i> บัญชีผู้ใช้</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="logoutConfirm(event)">
                                                    <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i> ออกจากระบบ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </nav>
                </div>

                {{-- <div class="order-2 md:order-3 flex items-center" id="nav-content">

                    <a class="flex no-underline text-gray-300 hover:text-white" href="{{ route('all-cafe') }}">
                        <span class="pl-1">ร้านคาเฟ่ทั้งหมด</span>
                    </a>

                    <a class="pl-5 flex no-underline text-gray-300 hover:text-white" href="{{ route('search') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span class="pl-1">ค้นหา</span>
                    </a>

                    @if (!Auth::check())
                        <a class="pl-5 flex no-underline text-gray-300 hover:text-white" href="{{ route('login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                            <span class="pl-1">เข้าสู่ระบบ</span>
                        </a>
                    @else
                        <div class="dropdown dropdown-end">
                            <div class="flex gap-2 text-gray-300 hover:text-white cursor-pointer" tabindex="0"
                                role="button">
                                <span class="pl-5 inline-block no-underline text-gray-300">สวัสดี,
                                    {{ Auth::user()->name }}</span>
                                <button class="text-gray-300">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-sm w-52">
                                <li><a><i class="fas fa-user mr-3"></i> บัญชีผู้ใช้</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="logoutConfirm(event)">
                                        <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i> ออกจากระบบ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div> --}}
            </div>
        </nav>

        <main>
            <div>@yield('contents')</div>
        </main>

        <footer class="bg-gray-800 text-white">
            <div class="text-center p-5">
                <p>Copyright &copy; 2024 CafeHeal | All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        AOS.init();

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

        $(document).on('ready', function() {
            // initialization of aos
            AOS.init({
                duration: 650,
                once: true
            });
        });
    </script>

</body>

</html>
