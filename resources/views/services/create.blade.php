@extends('layouts.app')

@section('title', 'เพิ่มข้อมูลบริการ - CafeHeal')

@section('contents')
    <div class="text-sm breadcrumbs ml-3 mb-2">
        <ul>
            <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
            <li><a href="{{ route('admin/service') }}" class="text-gray-500">ข้อมูลบริการ</a></li>
            <li class="text-blue-500 font-bold">เพิ่มข้อมูลบริการ</li>
        </ul>
    </div>
    <h1 class="font-bold text-2xl ml-3">เพิ่มบริการของร้านคาเฟ่</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="card max-w-3xl mx-auto bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">ฟอร์มเพิ่มข้อมูลบริการ</h2>
                <form action="{{ route('admin/service/store') }}" method="post">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">ชื่อบริการ</span>
                        </div>
                        <input type="text" name="name" placeholder="" class="input input-bordered w-full" />
                        @error('name')
                            <div class="label">
                                <span class="label-text-alt text-error font-semibold">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <div class="card-actions justify-end mt-4">
                        <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
