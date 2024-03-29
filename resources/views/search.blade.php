@extends('layouts.user')

@section('title', 'ค้นหาร้านคาเฟ่ - CafeHeal')

@section('contents')
    <div class="relative h-[400px]"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://assets-global.website-files.com/61c1522cd03553569e619b01/624d0b9208952404cd690aa6_5e54e9741e3cf65f8959fcc9_Cover.jpeg) no-repeat center;background-size:cover">
        <div class="flex flex-col gap-4 justify-center items-center w-full h-full px-3 md:px-0">

            <h1 class="dancing-script text-4xl md:text-5xl lg:text-6xl font-bold text-white">
                CafeHeal
            </h1>
            <div class="divider divider-primary w-16 self-center my-1"></div>

            <h2 class="text-white md:text-md lg:text-xl">
                ค้นหาร้านคาเฟ่ที่คุณสนใจ
            </h2>


            <div class="relative p-1 border border-gray-200 rounded-lg w-full max-w-lg">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <input type="text" name="keyword" class="rounded-md w-full p-3 outline-none"
                        placeholder="ป้อนชื่อร้านคาเฟ่...">

                    <button type="submit" class="absolute right-6 top-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </form>
            </div>

            <div class="flex justify-between align-middle w-full max-w-lg">
                <span class="text-white my-auto">หรือค้นหาด้วยประเภท</span>

                <div>
                    <button class="btn btn-outline border-white text-white hover:text-black hover:bg-white"
                        onclick="my_modal_1.showModal()">
                        ประเภท
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box max-w-xl">
                            <form action="{{ route('search') }}" method="GET" id="filterForm" >
                                @csrf
                                <div class="flex justify-between align-middle">
                                    <h3 class="font-bold text-xl text-black my-auto">ค้นหาด้วยประเภท</h3>
                                    <div>
                                        <button class="btn btn-link text-blue-500" onclick="resetFilter(event)">
                                            รีเซ็ต
                                        </button>
                                        <button class="btn btn-neutral">
                                            <i class="fa-solid fa-search"></i>
                                            ค้นหา
                                        </button>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="join join-vertical w-full">
                                    <div class="collapse collapse-arrow join-item border border-base-300">
                                        <input type="radio" name="my-accordion-4" checked="checked" />
                                        <div class="collapse-title text-xl font-medium">
                                            ถนน
                                        </div>
                                        <div class="collapse-content">
                                            @if (count($streetCategories) > 0)
                                                @foreach ($streetCategories as $streetCategory)
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span class="label-text">{{ $streetCategory->street }}</span>
                                                            <input type="checkbox" name="filter_keyword[]"
                                                                class="checkbox checkbox-success [--chkfg:white]"
                                                                value="{{ $streetCategory->street }}" />
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-error font-bold">ไม่พบข้อมูลประเภท</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collapse collapse-arrow join-item border border-base-300">
                                        <input type="radio" name="my-accordion-4" />
                                        <div class="collapse-title text-xl font-medium">
                                            เขต
                                        </div>
                                        <div class="collapse-content">
                                            @if (count($districtCategories) > 0)
                                                @foreach ($districtCategories as $districtCategory)
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span
                                                                class="label-text">{{ $districtCategory->district }}</span>
                                                            <input type="checkbox" name="filter_keyword[]"
                                                                class="checkbox checkbox-success [--chkfg:white]"
                                                                value="{{ $districtCategory->district }}" />
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-error font-bold">ไม่พบข้อมูลประเภท</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collapse collapse-arrow join-item border border-base-300">
                                        <input type="radio" name="my-accordion-4" />
                                        <div class="collapse-title text-xl font-medium">
                                            แขวง
                                        </div>
                                        <div class="collapse-content">
                                            @if (count($subDistrictCategories) > 0)
                                                @foreach ($subDistrictCategories as $subDistrictCategory)
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span
                                                                class="label-text">{{ $subDistrictCategory->sub_district }}</span>
                                                            <input type="checkbox" name="filter_keyword[]"
                                                                class="checkbox checkbox-success [--chkfg:white]"
                                                                value="{{ $subDistrictCategory->sub_district }}" />
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-error font-bold">ไม่พบข้อมูลประเภท</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collapse collapse-arrow join-item border border-base-300">
                                        <input type="radio" name="my-accordion-4" />
                                        <div class="collapse-title text-xl font-medium">
                                            บริการ
                                        </div>
                                        <div class="collapse-content">
                                            @if (count($services) > 0)
                                                @foreach ($services as $service)
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span class="label-text">{{ $service->name }}</span>
                                                            <input type="checkbox" name="filter_keyword[]"
                                                                class="checkbox checkbox-success [--chkfg:white]"
                                                                value="{{ $service->name }}" />
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-error font-bold">ไม่พบข้อมูลประเภท</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">ปิด</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-white py-8 h-full">
        <div class="container mx-auto">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <h2
                        class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl border-l-4 border-yellow-300 ps-3">
                        ผลลัพธ์การค้นหาร้านคาเฟ่ของคุณ
                    </h2>
                </div>
            </nav>


            <div class="w-full grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                @if (count($cafes) > 0)
                    @foreach ($cafes as $cafe)
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
                            <span class="text-error text-center text-lg font-medium">ไม่พบร้านคาเฟ่ที่คุณกำลังค้นหา
                                กรุณาลองอีกครั้ง</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        function resetFilter(event){
            event.preventDefault();
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
    </script>
@endsection
