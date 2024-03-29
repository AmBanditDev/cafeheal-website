@extends('layouts.app')

@section('title', 'ยินดีต้อนรับเข้าสู่หน้าแดชบอร์ด - CafeHeal')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">แดชบอร์ด</h1>
        <div class="mt-4">
            <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-4">
                <div class="w-full px-6 w-100">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                            </svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $userCount }}</h4>
                            <div class="text-gray-500">จำนวนผู้ใช้</div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-6 w-100">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-purple-600 bg-opacity-75 rounded-full">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path fill="currentColor"
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $cafeCount }}</h4>
                            <div class="text-gray-500">จำนวนร้านคาเฟ่</div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-6 w-100">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M216 64c-13.3 0-24 10.7-24 24s10.7 24 24 24h16v33.3C119.6 157.2 32 252.4 32 368H480c0-115.6-87.6-210.8-200-222.7V112h16c13.3 0 24-10.7 24-24s-10.7-24-24-24H256 216zM24 400c-13.3 0-24 10.7-24 24s10.7 24 24 24H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H24z" />
                            </svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $serviceCount }}</h4>
                            <div class="text-gray-500">จำนวนบริการของร้านคาเฟ่</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-100 bg-base-100 shadow-xl mx-6 mt-12">
            <div class="card-body">
                <div class="flex flex-col lg:flex-row justify-between align-middle mb-4">
                    <h2 class="card-title">ตารางแสดงข้อมูลร้านคาเฟ่ที่เพิ่มเข้ามาล่าสุด 5 รายการแรก</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ภาพรีวิวร้าน</th>
                                <th>ชื่อร้านคาเฟ่ (ไทย)</th>
                                <th>ชื่อร้านคาเฟ่ (อังกฤษ)</th>
                                <th>วันที่เพิ่มข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($cafes) > 0)
                                @php $index = count($cafes); @endphp
                                @foreach ($cafes as $cafe)
                                    <tr>
                                        <th>{{ $index }}</th>
                                        <td>
                                            <img src="/uploads/{{ $cafe->cafeGallery->image_main }}" alt="" style="width: 100px; height: 60px;">
                                        </td>
                                        <td>{{ $cafe->name_th }}</td>
                                        <td>{{ $cafe->name_en }}</td>
                                        <td>{{ $cafe->created_at }}</td>
                                    </tr>
                                    @php $index--; @endphp
                                @endforeach
                            @else
                                <tr class="text-center text-error font-bold">
                                    <td colspan="5">ไม่พบข้อมูลร้านคาเฟ่</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
