@extends('layouts.user')

@section('title', 'รายละเอียด - CafeHeal')

@section('contents')
    <div class="container mx-auto flex flex-col py-6">
        <div class="hidden w-full h-screen lg:h-[500px] lg:grid grid-cols-4  gap-4 px-3 lg:px-0">

            <!-- Article Sub Image Left -->
            <div class="grid gap-4 grid-cols-2 lg:grid-cols-1 col-span-4 lg:col-span-1 order-2">
                <div class="relative" data-aos="zoom-in-up" data-aos-duration="1200">
                    <img src="/uploads/{{ $cafe->cafeGallery->subimage_1 }}"
                        class="absolute inset-0 h-full w-full object-cover hover:opacity-75">
                </div>
                <div class="relative" data-aos="zoom-in-up" data-aos-duration="1200">
                    <img src="/uploads/{{ $cafe->cafeGallery->subimage_2 }}"
                        class="absolute inset-0 h-full w-full object-cover hover:opacity-75">
                </div>
            </div>

            <!-- Article Image Main -->
            <div class="relative w-full col-span-4 lg:col-span-2 order-1" data-aos="zoom-in" data-aos-duration="1000">
                <img src="/uploads/{{ $cafe->cafeGallery->image_main }}"
                    class="absolute inset-0 h-full w-full object-cover hover:opacity-75">
            </div>

            <!-- Article Sub Image Right -->
            <div class="grid gap-4 grid-cols-2 lg:grid-cols-1 col-span-4 lg:col-span-1 order-3">
                <div class="relative" data-aos="zoom-in-up" data-aos-duration="1200">
                    <img src="/uploads/{{ $cafe->cafeGallery->subimage_3 }}"
                        class="absolute inset-0 h-full w-full object-cover hover:opacity-75">
                </div>
                <div class="relative" data-aos="zoom-in-up" data-aos-duration="1200">
                    <img src="/uploads/{{ $cafe->cafeGallery->subimage_4 }}"
                        class="absolute inset-0 h-full w-full object-cover hover:opacity-75">
                </div>
            </div>
        </div>

        {{-- Gallery Responsive when display size <= md --}}
        <div class="grid lg:hidden gap-4 px-3 lg:px-0">
            <div>
                <img class="h-full max-w-full hover:opacity-75" src="/uploads/{{ $cafe->cafeGallery->image_main }}"
                    alt="">
            </div>
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <img class="h-full max-w-full hover:opacity-75" src="/uploads/{{ $cafe->cafeGallery->subimage_1 }}"
                        alt="">
                </div>
                <div>
                    <img class="h-full max-w-full hover:opacity-75" src="/uploads/{{ $cafe->cafeGallery->subimage_2 }}"
                        alt="">
                </div>
                <div>
                    <img class="h-full max-w-full hover:opacity-75" src="/uploads/{{ $cafe->cafeGallery->subimage_3 }}"
                        alt="">
                </div>
                <div>
                    <img class="h-full max-w-full hover:opacity-75" src="/uploads/{{ $cafe->cafeGallery->subimage_4 }}"
                        alt="">
                </div>
            </div>
        </div>

        <!-- Post Section -->
        <section class="w-full grid grid-cols-1 lg:grid-cols-3 gap-4 px-0 lg:px-3 shadow">
            <article class="w-full flex flex-col col-auto md:col-span-2 my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                    {{-- <div class="flex align-middle gap-4">
                        <div class="badge badge-error gap-2 text-white text-base rounded-md py-3">
                            5.0
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </div>
                        <span class="text-gray-400">รีวิว 100 รายการ</span>
                    </div> --}}
                    <h1 class="text-3xl lg:text-4xl text-blue-700 font-bold py-4">
                        {{ $cafe->name_en }}
                        <span class="text-gray-500 text-xl md:text-3xl">- {{ $cafe->name_th }}</span>
                    </h1>
                    <p href="#" class="text-sm pb-4">
                        เผยแพร่เมื่อ {{ $cafe->created_at }}
                    </p>

                    <div class="divider"></div>

                    <div class="pb-3 text-lg lg:text-xl">{!! $cafe->detail !!}</div>

                    <div class="divider"></div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-4 pb-3">
                        <div class="w-100">
                            <h1 class="text-2xl font-bold mb-3 border-l-4 border-yellow-300 ps-3">ข้อมูลร้านนี้</h1>
                            <ul class="list-none">
                                <li>ชื่อร้าน : {{ $cafe->name_th }} ({{ $cafe->name_en }})</li>
                                <li>ที่ตั้ง : {{ $cafe->address }}</li>
                                <li>เวลาเปิด-ปิด : {{ $cafe->working_time }}</li>
                                <li>เบอร์โทรศัพท์ : {{ $cafe->tel }}</li>
                                <li>
                                    เว็บไซต์ :
                                    <a href="{{ $cafe->website }}"
                                        class="hover:underline text-blue-500 break-words">{{ $cafe->website }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-100">
                            <h1 class="text-2xl font-bold mb-3 border-l-4 border-yellow-300 ps-3">บริการของร้าน</h1>
                            <ul class="list-none">
                                @if (count($cafeServices) > 0)
                                    @foreach ($cafeServices as $cafeService)
                                        <li class="mb-2">
                                            <div class="flex gap-4">
                                                @if ($cafeService->service_status == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path class="text-error" fill-rule="evenodd"
                                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path class="text-success" fill-rule="evenodd"
                                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                                {{ $cafeService->service->name }}
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="mb-2 text-error">
                                        ขออภัยในความไม่สะดวก ร้านนี้ยังไม่มีบริการ
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- <div class="divider"></div>

                    <h1 class="text-2xl font-bold mb-3 border-l-4 border-yellow-300 ps-3">รีวิว/ให้คะแนนร้าน</h1>
                    <p class="pb-3">Donec vulputate auctor leo lobortis congue. Sed elementum pharetra turpis. Nulla at
                        condimentum odio. Vestibulum ullamcorper enim eget porttitor bibendum. Proin eros nibh, maximus
                        vitae nisi a, blandit ultricies lectus. Vivamus eu maximus lacus. Maecenas imperdiet iaculis neque,
                        vitae efficitur felis vestibulum sagittis. Nunc a eros aliquet, egestas tortor hendrerit, posuere
                        diam. Proin laoreet, ligula non eleifend bibendum, orci nulla luctus ipsum, dignissim convallis quam
                        dolor et nulla.</p> --}}

                    <div class="divider"></div>

                    <h1 class="text-2xl font-bold mb-3 border-l-4 border-yellow-300 ps-3">ร้านที่คุณอาจสนใจ</h1>

                    <div class="w-full grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                        @if (count($cafeRandoms) > 0)
                            @foreach ($cafeRandoms as $cafeRandom)
                                <div class="w-full flex flex-col" data-aos="zoom-in">
                                    <a href="{{ route('detail', $cafeRandom->id) }}">
                                        <div class="h-56">
                                            <img class="hover:grow hover:shadow-lg"
                                                src="/uploads/{{ $cafeRandom->cafeGallery->image_main }}"
                                                style="width: 100%; height: 100%; object-fit:cover;">
                                        </div>
                                        <div class="pt-3">
                                            <p class="font-bold mb-2">{{ $cafeRandom->name_en }} {{ $cafeRandom->name_th }}</p>
                                            {{-- <div class="flex align-middle gap-4">
                                                <div class="badge badge-error gap-2 text-white text-base rounded-md py-3">
                                                    5.0
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-400">รีวิว 100 รายการ</span>
                                            </div> --}}
                                            <p class="text-gray-500 mt-2">{{ $cafeRandom->working_time }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-span-4">
                                <div class="flex flex-col gap-2 justify-center align-middle">
                                    <img class="self-center" src="/assets/sorry.png" alt="" style="width: 400px">
                                    <span class="text-error text-center text-lg font-medium">ไม่พบรายการร้านคาเฟ่
                                        ขออภัย</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </article>

            <!-- Sidebar Section -->
            <aside class="w-full flex flex-col items-center px-3 my-4">
                <div class="w-full bg-white shadow flex flex-col my-4 ">
                    {{-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.0941127249976!2d100.50472081140141!3d13.77319778656505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2995e778f8bfb%3A0xf9a7730535388e56!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lij4Liy4LiK4Lig4Lix4LiP4Liq4Lin4LiZ4Liq4Li44LiZ4Lix4LiZ4LiX4Liy!5e0!3m2!1sth!2sth!4v1709582234510!5m2!1sth!2sth"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <div style="width: 100%; height: 400px">
                        <img src="https://s1.elespanol.com/2023/09/01/elandroidelibre/791181520_235739262_1706x960.jpg"
                            alt="" style="width: 100%; height: 100%; object-fit: cover">
                    </div>
                    <p class="text-md font-semibold p-6">พิกัดร้าน :
                        <a href="{{ $cafe->map_link }}" target="_blank"
                            class="text-blue-500 text-md break-words">{{ $cafe->map_link }}</a>
                    </p>
                </div>
            </aside>
        </section>
    </div>
@endsection
