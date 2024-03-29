@extends('layouts.app')

@section('title', 'แก้ไขบริการของร้านคาเฟ่ - CafeHeal')

@section('contents')
    <div class="text-sm breadcrumbs ml-3 mb-2">
        <ul>
            <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
            <li><a href="{{ route('admin/cafe-service') }}" class="text-gray-500">บริการของร้านคาเฟ่</a></li>
            <li class="text-blue-500 font-bold">แก้ไขบริการของร้านคาเฟ่</li>
        </ul>
    </div>
    <h1 class="font-bold text-2xl ml-3">แก้ไขบริการของร้านคาเฟ่</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="card max-w-3xl mx-auto bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">ฟอร์มแก้ไขบริการของร้านคาเฟ่</h2>
                <form action="{{ route('admin/cafe-service/update', $cafeService->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full mb-2">
                        <div class="label">
                            <span class="label-text">เลือกร้านคาเฟ่</span>
                        </div>
                        <select class="select select-bordered" name="cafe_id" disabled>
                            <option disabled selected>-- เลือก --</option>
                            @if (count($cafes) > 0)
                                @foreach ($cafes as $cafe)
                                    <option value="{{ $cafe->id }}" {{ $cafeService->cafe_id == $cafe->id ? 'selected' : '' }}>{{ $cafe->name_th }}</option>
                                @endforeach
                            @else
                            @endif
                        </select>
                    </label>
                    <label class="form-control w-full mb-2">
                        <div class="label">
                            <span class="label-text">เลือกบริการ</span>
                        </div>
                        <select class="select select-bordered" name="service_id" disabled>
                            <option disabled selected>-- เลือก --</option>
                            @if (count($services) > 0)
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ $cafeService->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                @endforeach
                            @else
                            @endif
                        </select>
                    </label>
                    <div class="divider"></div>
                    <h4 class="card-title text-base mb-2">สถานะการบริการ</h4>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">ไม่ให้บริการ</span>
                            <input type="radio" name="service_status" class="radio checked:bg-red-500"
                                value="0" {{ $cafeService->service_status == 0 ? 'checked' : '' }} />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">ให้บริการ</span>
                            <input type="radio" name="service_status" class="radio checked:bg-green-500"
                                value="1" {{ $cafeService->service_status == 1 ? 'checked' : '' }} />
                        </label>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('admin/cafe-service') }}" type="submit" class="btn">ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary">อัพเดตข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
