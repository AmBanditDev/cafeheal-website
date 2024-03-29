@extends('layouts.app')

@section('title', 'ข้อมูลผู้ใช้ - CafeHeal')

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
                <li class="text-blue-500 font-bold">ข้อมูลผู้ใช้</li>
            </ul>
        </div>
        <h1 class="font-bold text-2xl ml-3">ข้อมูลผู้ใช้</h1>
        <div class="divider"></div>
        <div class="card w-100 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title mb-4">ตารางข้อมูลผู้ใช้ทั้งหมด</h2>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>อีเมล</th>
                                <th>ระดับผู้ใช้</th>
                                <th>วันที่สร้างบัญชีผู้ใช้</th>
                                <th>วันที่แก้ไขบัญชี</th>
                                <th>ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @php $index = count($users); @endphp
                                @foreach ($users->reverse() as $user)
                                    <tr>
                                        <th>{{ $index }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->type == 'user')
                                                <div class="badge badge-success text-white w-16">ผู้ใช้</div>
                                            @else
                                                <div class="badge badge-error w-16 text-white">แอดมิน</div>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td style="width: 200px">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin/user/edit', $user->id) }}" class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('admin/user/destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-error text-white" onclick="deleteConfirm(event)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $index--; @endphp
                                @endforeach
                            @else
                                <tr class="text-center text-error font-bold">
                                    <td colspan="6">ไม่พบข้อมูลผู้ใช้</td>
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
