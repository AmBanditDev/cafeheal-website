@extends('layouts.app')

@section('title', 'แก้ไขข้อมูลบริการ - CafeHeal')

@section('contents')
    <div class="text-sm breadcrumbs ml-3 mb-2">
        <ul>
            <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
            <li><a href="{{ route('admin/service') }}" class="text-gray-500">ข้อมูลบริการ</a></li>
            <li class="text-blue-500 font-bold">แก้ไขข้อมูลบริการ</li>
        </ul>
    </div>
    <h1 class="font-bold text-2xl ml-3">แก้ไขบริการของร้านคาเฟ่</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="card max-w-3xl mx-auto bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">ฟอร์มแก้ไขข้อมูลบริการ</h2>
                <form action="{{ route('admin/service/update', $service->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">ชื่อบริการ</span>
                        </div>
                        <input type="text" name="name" class="input input-bordered w-full" value="{{ $service->name }}" />
                        <div class="label">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="label-text-alt">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </label>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('admin/service') }}" type="submit" class="btn">ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary">อัพเดตข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
