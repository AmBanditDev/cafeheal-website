@extends('layouts.app')

@section('title', 'แก้ไขข้อมูลผู้ใช้ - CafeHeal')

@section('contents')
    <div class="text-sm breadcrumbs ml-3 mb-2">
        <ul>
            <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
            <li><a href="{{ route('admin/user') }}" class="text-gray-500">ข้อมูลผู้ใช้</a></li>
            <li class="text-blue-500 font-bold">แก้ไขข้อมูลผู้ใช้</li>
        </ul>
    </div>
    <h1 class="font-bold text-2xl ml-3">แก้ไขข้อมูลผู้ใช้</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="card max-w-3xl mx-auto bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">ฟอร์มแก้ไขข้อมูลผู้ใช้</h2>
                <form action="{{ route('admin/user/update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">ชื่อผู้ใช้</span>
                        </div>
                        <input type="text" name="name" class="input input-bordered w-full"
                            value="{{ $user->name }}" disabled />
                        <div class="label">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="label-text-alt">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">อีเมล</span>
                        </div>
                        <input type="text" name="name" class="input input-bordered w-full"
                            value="{{ $user->email }}" disabled />
                        <div class="label">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="label-text-alt">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </label>
                    <label class="form-control w-full mb-2">
                        <div class="label">
                            <span class="label-text">เลือกระดับผู้ใช้</span>
                        </div>
                        <select class="select select-bordered" name="user_type">
                            <option disabled selected>-- เลือก --</option>
                            <option value="user">ผู้ใช้</option>
                            <option value="admin">แอดมิน</option>
                        </select>
                    </label>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('admin/user') }}" type="submit" class="btn">ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary">อัพเดตข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
