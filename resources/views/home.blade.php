@extends('layouts.user')

@section('title', 'CafeHeal - คาเฟ่ฮีล')

@section('contents')
    <div class="carousel relative container mx-auto" style="max-width:100%;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div
                    class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right carousel-style-1">
                    <div class="container m-auto ">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-white text-md lg:text-2xl xl:text-3xl my-4 w-80 md:w-full"
                                style="line-height: 2.5rem"  data-aos="fade-right">
                                <i class="fa-solid fa-quote-left md:text-2xl lg:text-4xl"></i>
                                สัมผัสความอบอุ่นของกรุงเทพฯที่ 'คาเฟ่ฮีล' 🌟☕️
                                เปิดประตูสู่โลกของรสชาติที่เหนือระดับและบรรยากาศที่น่าหลงใหลได้ทุกที่เมื่อคุณเข้ามาที่นี่!
                                <i>#คาเฟ่ฮีล #กรุงเทพคาเฟ่ #คาเฟ่เปิดใหม่</i>
                                <i class="fa-solid fa-quote-right md:text-2xl lg:text-4xl"></i>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-3"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div
                    class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right carousel-style-2">

                    <div class="container m-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-white text-md lg:text-2xl xl:text-3xl my-4 w-80 md:w-full"
                                style="line-height: 2.5rem">
                                <i class="fa-solid fa-quote-left md:text-2xl lg:text-4xl"></i>
                                อยากสัมผัสบรรยากาศคาเฟ่ที่ไม่ธรรมดาในกรุงเทพฯ?
                                มาร่วมสนุกกับชิมกาแฟและขนมหวานที่ 'คาเฟ่ฮีล'
                                ที่นี่เรามอบประสบการณ์ที่ดีที่สุดให้กับคุณทุกครั้ง! <i>#สัมผัสความอบอุ่น #คาเฟ่ฮีล
                                    #กรุงเทพคาเฟ่</i>
                                <i class="fa-solid fa-quote-right md:text-2xl lg:text-4xl"></i>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-1"
                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div
                    class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom carousel-style-3">

                    <div class="container m-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-white text-md lg:text-2xl xl:text-3xl my-4 w-80 md:w-full"
                                style="line-height: 2.5rem">
                                <i class="fa-solid fa-quote-left md:text-2xl lg:text-4xl"></i>
                                ค้นพบรสชาติที่โดดเด่นและบรรยากาศที่น่าหลงใหลในกรุงเทพฯที่
                                'คาเฟ่ฮีล' ☕️✨ มาร่วมสัมผัสความสุขและความอบอุ่นกับเราทุกวัน! <i>#ร้านคาเฟ่ #คาเฟ่ฮีล
                                    #กรุงเทพมหานคร</i>
                                <i class="fa-solid fa-quote-right md:text-2xl lg:text-4xl"></i>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-2"
                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12 gap-12">

            <div class="w-full">
                <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                        <h2
                            class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl border-l-4 border-yellow-300 ps-3">
                            ร้านคาเฟ่แนะนำ
                        </h2>
                        <a href="{{ route('all-cafe') }}"
                            class="flex items-center text-black text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <span>ดูเพิ่มเติม</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </nav>

                <div class="w-full grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    @if (count($cafesRecommend) > 0)
                        @foreach ($cafesRecommend as $cafe)
                            <div class="w-full p-6 flex flex-col" data-aos="zoom-in">
                                <a href="{{ route('detail', $cafe->id) }}">
                                    <div class="h-56">
                                        <img class="hover:grow hover:shadow-lg"
                                            src="/uploads/{{ $cafe->cafeGallery->image_main }}"
                                            style="width: 100%; height: 100%; object-fit:cover;">
                                    </div>
                                    <div class="pt-3">
                                        <p class="text-lg font-bold mb-2">{{ $cafe->name_en }} - {{ $cafe->name_th }}</p>
                                        {{-- <div class="flex align-middle gap-4">
                                            <div class="badge badge-error gap-2 text-white text-base rounded-md py-3">
                                                5.0
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-400">รีวิว 100 รายการ</span>
                                        </div> --}}
                                        <p class="text-gray-500 mt-2">{{ $cafe->working_time }}</p>
                                    </div>
                                    <button
                                        class="flex items-center mt-4 text-black text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                        <span>แวะชมร้าน</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-4">
                            <div class="flex flex-col gap-2 justify-center align-middle">
                                <img class="self-center" src="/assets/sorry.png" alt="" style="width: 400px">
                                <span class="text-error text-center text-lg font-medium">ไม่พบรายการร้านคาเฟ่ ขออภัย</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="w-full">
                <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                        <h2
                            class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl border-l-4 border-yellow-300 ps-3">
                            ร้านคาเฟ่ที่คุณอาจสนใจ
                        </h2>
                        <a href="{{ route('all-cafe') }}"
                            class="flex items-center text-black text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <span>ดูเพิ่มเติม</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </nav>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @if (count($cafesInterest) > 0)
                        @foreach ($cafesInterest as $cafe)
                            <div class="w-full p-6 flex flex-col" data-aos="zoom-in">
                                <a href="{{ route('detail', $cafe->id) }}">
                                    <div class="h-52">
                                        <img class="hover:grow hover:shadow-lg"
                                            src="/uploads/{{ $cafe->cafeGallery->image_main }}"
                                            style="width: 100%; height: 100%; object-fit:cover;">
                                    </div>
                                    <div class="pt-3">
                                        <p class="text-lg font-bold mb-2">{{ $cafe->name_en }} - {{ $cafe->name_th }}</p>
                                        {{-- <div class="flex align-middle gap-4">
                                            <div class="badge badge-error gap-2 text-white text-base rounded-md py-3">
                                                5.0
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-400">รีวิว 100 รายการ</span>
                                        </div> --}}
                                        <p class="text-gray-500 mt-2">{{ $cafe->working_time }}</p>
                                    </div>
                                    <button
                                        class="flex items-center mt-4 text-black text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                        <span>แวะชมร้าน</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-4">
                            <div class="flex flex-col gap-2 justify-center align-middle">
                                <img class="self-center" src="/assets/sorry.png" alt="" style="width: 400px">
                                <span class="text-error text-center text-lg font-medium">ไม่พบรายการร้านคาเฟ่ ขออภัย</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
