@extends('layouts.app')

@section('title', 'บริการของร้านคาเฟ่ - CafeHeal')

@section('contents')
    <div>
        @if ($message = Session::get('success'))
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ $message }}"
                });
            </script>
        @endif
        <div class="text-sm breadcrumbs ml-3 mb-2">
            <ul>
                <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
                <li class="text-blue-500 font-bold">ข้อมูลบริการของร้านคาเฟ่</li>
            </ul>
        </div>
        <h1 class="font-bold text-2xl ml-3">ข้อมูลบริการของร้านคาเฟ่</h1>
        <div class="divider"></div>
        <div class="card w-100 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex flex-col lg:flex-row justify-between align-middle mb-4">
                    <h2 class="card-title">ตารางข้อมูลบริการของร้านคาเฟ่</h2>
                    <div class="flex justify-end w-full lg:w-1/2 gap-5 lg:gap-10 mt-5 lg:mt-0">
                        <div class="relative p-1 border border-gray-200 rounded-lg w-full">
                            <form action="{{ route('admin/cafe-service/search') }}" method="GET">
                                @csrf
                                <input type="text" name="keyword" class="rounded-md w-full p-2 outline-none"
                                    placeholder="ป้อนชื่อร้านคาเฟ่...">

                                <button type="submit" class="absolute right-6 top-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('admin/cafe-service/create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i>
                            เพิ่มบริการ
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อร้านคาเฟ่ (ไทย)</th>
                                <th>ชื่อร้านคาเฟ่ (อังกฤษ)</th>
                                <th>บริการของร้าน</th>
                                <td>สถานะการบริการ</td>
                                <th>วันที่เพิ่มข้อมูล</th>
                                <th>วันที่แก้ไขข้อมูล</th>
                                <th>ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($cafes) > 0 && $checkCafeService > 0)
                                @php $index = $cafeServicesCount; @endphp
                                @foreach ($cafes->reverse() as $cafe)
                                    @foreach ($cafe->cafeServices->reverse() as $cafeService)
                                        <tr>
                                            <th>{{ $index }}</th>
                                            <td>{{ $cafe->name_th }}</td>
                                            <td>{{ $cafe->name_en }}</td>
                                            <td>{{ $cafeService->service->name }}</td>
                                            <td>
                                                @if ($cafeService->service_status == 0)
                                                    <div class="badge badge-error text-white">ไม่ให้บริการ</div>
                                                @else
                                                    <div class="badge badge-success text-white">ให้บริการ</div>
                                                @endif

                                            </td>
                                            <td>{{ $cafeService->created_at }}</td>
                                            <td>{{ $cafeService->updated_at }}</td>
                                            <td>
                                                <div class="flex gap-2">
                                                    <a href="{{ route('admin/cafe-service/edit', $cafeService->id) }}"
                                                        class="btn btn-warning text-black">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin/cafe-service/destroy', $cafeService->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-error text-white"
                                                            onclick="deleteConfirm(event)">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $index--; @endphp
                                    @endforeach
                                @endforeach
                            @else
                                <tr class="text-center text-error font-bold">
                                    <td colspan="8">ไม่พบข้อมูลบริการของร้านคาเฟ่</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.deleteConfirm = function(event) {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: "แจ้งเตือน",
                text: "คุณต้องการลบข้อมูลหรือไม่?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ตกลง",
                cancelButtonText: "ยกเลิก",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
