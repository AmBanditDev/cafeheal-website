@extends('layouts.app')

@section('title', 'เพิ่มข้อมูลร้านคาเฟ่ - CafeHeal')

@section('contents')
    <div>
        <div class="text-sm breadcrumbs ml-3 mb-2">
            <ul>
                <li><a href="{{ route('admin/home') }}" class="text-gray-500">แดชบอร์ด</a></li>
                <li><a href="{{ route('admin/cafe') }}" class="text-gray-500">ข้อมูลร้านคาเฟ่</a></li>
                <li class="text-blue-500 font-bold">เพิ่มข้อมูลร้านคาเฟ่</li>
            </ul>
        </div>
        <h1 class="font-bold text-2xl ml-3">เพิ่มข้อมูลร้านคาเฟ่</h1>
        <div class="divider"></div>
        <div class="card w-100 bg-base-100 shadow-xl">
            <form action="{{ route('admin/cafe/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="flex justify-between align-middle mb-4">
                        <h2 class="card-title">ฟอร์มเพิ่มข้อมูลร้านคาเฟ่</h2>
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                เพิ่มข้อมูล
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

                        <!-- Form card left -->
                        <div class="card w-100 bg-base-100 shadow-md order-2 lg:order-1">
                            <div class="card-body">
                                <h2 class="card-title">ภาพรีวิวร้าน</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="card col-span-1 md:col-span-2 overflow-hidden shadow-md rounded-md">
                                        <figure class="relative h-[350px]">
                                            <img id="image_main" src="/assets/image_placeholder.png"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 1</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="file" name="image_main"
                                                class="file-input file-input-bordered  file-input-sm w-full" onchange="previewImage(event, 'image_main')" required />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative h-[250px]">
                                            <img id="subimage_1" src="/assets/image_placeholder.png"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 2</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="file" name="subimage_1"
                                                class="file-input file-input-bordered  file-input-sm w-full" onchange="previewImage(event, 'subimage_1')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative h-[250px]">
                                            <img id="subimage_2" src="/assets/image_placeholder.png"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 3</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="file" name="subimage_2"
                                                class="file-input file-input-bordered  file-input-sm w-full" onchange="previewImage(event, 'subimage_2')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative h-[250px]">
                                            <img id="subimage_3" src="/assets/image_placeholder.png"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 4</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="file" name="subimage_3"
                                                class="file-input file-input-bordered  file-input-sm w-full" onchange="previewImage(event, 'subimage_3')" />
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden shadow-md rounded-md">
                                        <figure class="relative h-[250px]">
                                            <img id="subimage_4" src="/assets/image_placeholder.png"
                                                style="width: 100%; height: 100%; object-fit: cover" alt="" />
                                            <span class="badge badge-lg absolute bottom-2 right-2">ภาพที่ 5</span>
                                        </figure>
                                        <div class="card-body text-center p-3">
                                            <input type="file" name="subimage_4"
                                                class="file-input file-input-bordered  file-input-sm w-full" onchange="previewImage(event, 'subimage_4')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form card right -->
                        <div class="card w-100 bg-base-100 shadow-md order-1 lg:order-2">
                            <div class="card-body">
                                <h2 class="card-title">ข้อมูลร้าน</h2>
                                <div class="flex flex-col md:flex-row gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ชื่อร้านคาเฟ่ (ไทย) <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="name_th" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้านคาเฟ่ (ไทย)')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ชื่อร้านคาเฟ่ (อังกฤษ) <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="name_en" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้านคาเฟ่ (อังกฤษ)')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                </div>
                                <label class="form-control">
                                    <div class="label">
                                        <span class="label-text">รายละเอียดร้าน <b class="text-error">*</b></span>
                                    </div>
                                    <textarea class="textarea textarea-bordered h-24" id="editor" name="detail" placeholder="กรอกรายละเอียดร้าน"></textarea>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">ที่ตั้งร้าน <b class="text-error">*</b></span>
                                    </div>
                                    <input type="text" name="address" class="input input-bordered w-full" required
                                        oninvalid="this.setCustomValidity('กรุณากรอกที่ตั้งร้าน')"
                                        oninput="this.setCustomValidity('')" />
                                </label>
                                <div class="flex flex-col md:flex-row gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ถนน</span>
                                        </div>
                                        <input type="text" name="street" class="input input-bordered w-full"
                                            required oninvalid="this.setCustomValidity('กรุณากรอกชื่อถนน')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">เขต</span>
                                        </div>
                                        <input type="text" name="district" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อเขต')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">แขวง</span>
                                        </div>
                                        <input type="text" name="sub_district" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกชื่อแขวง')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                </div>
                                <div class="flex flex-col md:flex-row gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">วันเวลาเปิด-ปิดร้าน <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="working_time" class="input input-bordered w-full"
                                            required oninvalid="this.setCustomValidity('กรุณากรอกวันเวลาเปิด-ปิดร้าน')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">เบอร์โทรศัพท์ <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="tel" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรศัพท์')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                </div>
                                <div class="flex flex-col md:flex-row gap-4">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ลิ้งค์เว็บไซต์ร้าน <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="website" class="input input-bordered w-full" required
                                            oninvalid="this.setCustomValidity('กรุณากรอกลิ้งค์เว็บไซต์ร้าน')"
                                            oninput="this.setCustomValidity('')" />
                                    </label>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">ลิ้งค์แผนที่ร้าน <b class="text-error">*</b></span>
                                        </div>
                                        <input type="text" name="map_link" class="input input-bordered w-full"
                                            required oninvalid="this.setCustomValidity('กรุณากรอกลิ้งค์แผนที่ร้าน')"
                                            oninput="this.setCustomValidity('')" />
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
