@extends('layouts.app')

@section('title', 'แก้ไขข้อมูลร้านคาเฟ่ - CafeHeal')

@section('contents')
    <div>
        <div class="text-sm breadcrumbs ml-3 mb-2">
            <ul>
                <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
                <li><a href="{{ route('admin/cafe') }}" class="text-gray-500">ข้อมูลร้านคาเฟ่</a></li>
                <li class="text-blue-500 font-bold">แก้ไขข้อมูลร้านคาเฟ่</li>
            </ul>
        </div>
        <h1 class="font-bold text-2xl ml-3">แก้ไขข้อมูลร้านคาเฟ่</h1>
        <div class="divider"></div>
        <div class="card w-100 bg-base-100 shadow-xl">
            <form action="{{ route('admin/cafe/update', $cafe->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="flex justify-between align-middle mb-4">
                        <h2 class="card-title">ฟอร์มแก้ไขข้อมูลร้านคาเฟ่</h2>
                        {{-- <input type="hidden" name="hidden_id" value="{{ $cafe->id }}"> --}}
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i>
                                อัพเดตข้อมูล
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

                        <!-- Form card left -->
                        <div class="card w-100 bg-base-100 shadow-md">
                            <div class="card-body">
                                <h2 class="card-title">ภาพรีวิวร้าน</h2>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="card col-span-2 overflow-hidden shadow-md rounded-md">
                                        <figure class="relative">
                                            <img id="image_main"
                                                src="{{ asset('uploads/' . $cafe->cafeGallery->image_main) }}"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 1</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="hidden" name="old_image_main"
                                                value="{{ $cafe->cafeGallery->image_main }}">
                                            <input type="file" name="image_main"
                                                class="file-input file-input-bordered  file-input-sm w-full"
                                                onchange="previewImage(event, 'image_main')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative">
                                            <img id="subimage_1"
                                                src="{{ asset('uploads/' . $cafe->cafeGallery->subimage_1) }}"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 2</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="hidden" name="old_subimage_1"
                                                value="{{ $cafe->cafeGallery->subimage_1 }}">
                                            <input type="file" name="subimage_1"
                                                class="file-input file-input-bordered  file-input-sm w-full"
                                                onchange="previewImage(event, 'subimage_1')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative">
                                            <img id="subimage_2"
                                                src="{{ asset('uploads/' . $cafe->cafeGallery->subimage_2) }}"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 3</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="hidden" name="old_subimage_2"
                                                value="{{ $cafe->cafeGallery->subimage_2 }}">
                                            <input type="file" name="subimage_2"
                                                class="file-input file-input-bordered  file-input-sm w-full"
                                                onchange="previewImage(event, 'subimage_2')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative">
                                            <img id="subimage_3"
                                                src="{{ asset('uploads/' . $cafe->cafeGallery->subimage_3) }}"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 4</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="hidden" name="old_subimage_3"
                                                value="{{ $cafe->cafeGallery->subimage_3 }}">
                                            <input type="file" name="subimage_3"
                                                class="file-input file-input-bordered  file-input-sm w-full"
                                                onchange="previewImage(event, 'subimage_3')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative">
                                            <img id="subimage_4"
                                                src="{{ asset('uploads/' . $cafe->cafeGallery->subimage_4) }}"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 5</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="hidden" name="old_subimage_4"
                                                value="{{ $cafe->cafeGallery->subimage_4 }}">
                                            <input type="file" name="subimage_4"
                                                class="file-input file-input-bordered  file-input-sm w-full"
                                                onchange="previewImage(event, 'subimage_4')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form card right -->
                        <div class="card w-100 bg-base-100 shadow-md">
                            <div class="card-body">
                                <h2 class="card-title">ข้อมูลร้าน</h2>
                                <div class="flex gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ชื่อร้านคาเฟ่ (ไทย)</span>
                                        </div>
                                        <input type="text" name="name_th" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้านคาเฟ่ (ไทย)')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->name_th }}" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ชื่อร้านคาเฟ่ (อังกฤษ)</span>
                                        </div>
                                        <input type="text" name="name_en" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้านคาเฟ่ (อังกฤษ)')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->name_en }}" />
                                    </label>
                                </div>
                                <label class="form-control">
                                    <div class="label">
                                        <span class="label-text">รายละเอียดร้าน</span>
                                    </div>
                                    <textarea class="textarea textarea-bordered h-24" id="editor" name="detail" placeholder="กรอกรายละเอียดร้าน">
                                        {{ $cafe->detail }}
                                    </textarea>
                                </label>

                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">ที่ตั้งร้าน</span>
                                    </div>
                                    <input type="text" name="address" class="input input-bordered w-full" required
                                        oninvalid="this.setCustomValidity('กรุณากรอกที่ตั้งร้าน')"
                                        oninput="this.setCustomValidity('')" value="{{ $cafe->address }}" />
                                </label>
                                <div class="flex flex-col md:flex-row gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ถนน</span>
                                        </div>
                                        <input type="text" name="street" class="input input-bordered w-full" value="{{ $cafe->street }}"/>
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">เขต</span>
                                        </div>
                                        <input type="text" name="district" class="input input-bordered w-full" value="{{ $cafe->district }}" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">แขวง</span>
                                        </div>
                                        <input type="text" name="sub_district" class="input input-bordered w-full" value="{{ $cafe->sub_district }}" />
                                    </label>
                                </div>
                                <div class="flex gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">วันเวลาเปิด-ปิดร้าน</span>
                                        </div>
                                        <input type="text" name="working_time" class="input input-bordered w-full"
                                            required oninvalid="this.setCustomValidity('กรุณากรอกวันเวลาเปิด-ปิดร้าน')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->working_time }}" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">เบอร์โทรศัพท์</span>
                                        </div>
                                        <input type="text" name="tel" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรศัพท์')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->tel }}" />
                                    </label>
                                </div>
                                <div class="flex gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ลิ้งค์เว็บไซต์ร้าน</span>
                                        </div>
                                        <input type="text" name="website" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกลิ้งค์เว็บไซต์ร้าน')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->website }}" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ลิ้งค์แผนที่ร้าน</span>
                                        </div>
                                        <input type="text" name="map_link" class="input input-bordered w-full"
                                            required oninvalid="this.setCustomValidity('กรุณากรอกลิ้งค์แผนที่ร้าน')"
                                            oninput="this.setCustomValidity('')" value="{{ $cafe->map_link }}" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewId);
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
