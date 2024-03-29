<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\CafeGallery;
use App\Models\CafeService;
use App\Models\Service;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::all();
        return view('cafes.index', compact('cafes'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword != null && $keyword != "") {
            $cafes = Cafe::where('name_th', 'like', "%$keyword%")->orWhere('name_en', 'like', "%$keyword%")->get();
        } else {
            $cafes = Cafe::all();
        }
        return view('cafes.index', compact('cafes'));
    }

    public function create()
    {
        $services = Service::all();
        return view('cafes.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'detail' => 'required|string',
            'address' => 'required|string|max:255',
            'street' => 'string|nullable|max:255',
            'district' => 'string|nullable|max:255',
            'sub_district' => 'string|nullable|max:255',
            'tel' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'working_time' => 'required|string|max:255',
            'map_link' => 'required|string|max:255',
            'image_main' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'subimage_1' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'subimage_2' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'subimage_3' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'subimage_4' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // save to cafes table
        $cafe = new Cafe();
        $cafe->name_th = trim($request->name_th);
        $cafe->name_en = trim($request->name_en);
        $cafe->detail = trim($request->detail);
        $cafe->address = trim($request->address);
        $cafe->street = trim($request->street);
        $cafe->district = trim($request->district);
        $cafe->sub_district = trim($request->sub_district);
        $cafe->tel = trim($request->tel);
        $cafe->website = trim($request->website);
        $cafe->working_time = trim($request->working_time);
        $cafe->map_link = trim($request->map_link);
        $cafe->save();

        // save to cafe_galleries table
        $cafeGallery = new CafeGallery();

        $file_name_image_main = 'main_' . time() . '.' . request()->image_main->getClientOriginalExtension();
        request()->image_main->move(public_path('uploads'), $file_name_image_main);

        $file_name_subimage_1 = 'sub01_' . time() . '.' . request()->subimage_1->getClientOriginalExtension();
        request()->subimage_1->move(public_path('uploads'), $file_name_subimage_1);

        $file_name_subimage_2 = 'sub02_' . time() . '.' . request()->subimage_2->getClientOriginalExtension();
        request()->subimage_2->move(public_path('uploads'), $file_name_subimage_2);

        $file_name_subimage_3 = 'sub03_' . time() . '.' . request()->subimage_3->getClientOriginalExtension();
        request()->subimage_3->move(public_path('uploads'), $file_name_subimage_3);

        $file_name_subimage_4 = 'sub04_' . time() . '.' . request()->subimage_4->getClientOriginalExtension();
        request()->subimage_4->move(public_path('uploads'), $file_name_subimage_4);

        $cafeGallery->cafe_id = $cafe->id;
        $cafeGallery->image_main = $file_name_image_main;
        $cafeGallery->subimage_1 = $file_name_subimage_1;
        $cafeGallery->subimage_2 = $file_name_subimage_2;
        $cafeGallery->subimage_3 = $file_name_subimage_3;
        $cafeGallery->subimage_4 = $file_name_subimage_4;
        $cafeGallery->save();

        return redirect()->route('admin/cafe')->with('success', 'เพิ่มข้อมูลร้านคาเฟ่สำเร็จ!');
    }

    public function show($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafeGallery = $cafe->cafeGallery;
        $cafeServices = $cafe->cafeServices;

        return view('cafes.detail', compact('cafe', 'cafeGallery', 'cafeServices'));
    }

    public function edit($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafeGallery = $cafe->cafeGallery;
        return view('cafes.edit', compact('cafe', 'cafeGallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'detail' => 'required|string',
            'address' => 'required|string|max:255',
            'street' => 'string|nullable|max:255',
            'district' => 'string|nullable|max:255',
            'sub_district' => 'string|nullable|max:255',
            'tel' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'working_time' => 'required|string|max:255',
            'map_link' => 'required|string|max:255',
        ]);

        $file_name_image_main = $request->old_image_main;
        $file_name_subimage_1 = $request->old_subimage_1;
        $file_name_subimage_2 = $request->old_subimage_2;
        $file_name_subimage_3 = $request->old_subimage_3;
        $file_name_subimage_4 = $request->old_subimage_4;

        if ($request->image_main != '') {
            $file_name_image_main = 'main_' . time() . '.' . request()->image_main->getClientOriginalExtension();
            request()->image_main->move(public_path('uploads'), $file_name_image_main);
        }
        if ($request->subimage_1 != '') {
            $file_name_subimage_1 = 'sub01_' . time() . '.' . request()->subimage_1->getClientOriginalExtension();
            request()->subimage_1->move(public_path('uploads'), $file_name_subimage_1);
        }
        if ($request->subimage_2 != '') {
            $file_name_subimage_2 = 'sub02_' . time() . '.' . request()->subimage_2->getClientOriginalExtension();
            request()->subimage_2->move(public_path('uploads'), $file_name_subimage_2);
        }
        if ($request->subimage3 != '') {
            $file_name_subimage_3 = 'sub03_' . time() . '.' . request()->subimage_3->getClientOriginalExtension();
            request()->subimage_3->move(public_path('uploads'), $file_name_subimage_3);
        }
        if ($request->subimage_4 != '') {
            $file_name_subimage_4 = 'sub04_' . time() . '.' . request()->subimage_4->getClientOriginalExtension();
            request()->subimage_4->move(public_path('uploads'), $file_name_subimage_4);
        }

        $cafe = Cafe::findOrFail($id);
        $cafe->name_th = trim($request->name_th);
        $cafe->name_en = trim($request->name_en);
        $cafe->detail = trim($request->detail);
        $cafe->address = trim($request->address);
        $cafe->street = trim($request->street);
        $cafe->district = trim($request->district);
        $cafe->sub_district = trim($request->sub_district);
        $cafe->tel = trim($request->tel);
        $cafe->website = trim($request->website);
        $cafe->working_time = trim($request->working_time);
        $cafe->map_link = trim($request->map_link);

        $cafe->cafeGallery->image_main = $file_name_image_main;
        $cafe->cafeGallery->subimage_1 = $file_name_subimage_1;
        $cafe->cafeGallery->subimage_2 = $file_name_subimage_2;
        $cafe->cafeGallery->subimage_3 = $file_name_subimage_3;
        $cafe->cafeGallery->subimage_4 = $file_name_subimage_4;

        $cafe->save();
        $cafe->cafeGallery->save();

        return redirect()->route('admin/cafe')->with('success', 'อัพเดตข้อมูลร้านคาเฟ่สำเร็จ!');
    }

    public function destroy($id)
    {
        // $cafe = Cafe::findOrFail($id);
        $cafe = Cafe::with('cafeGallery')->findOrFail($id);

        $image_path = public_path() . "/uploads/";
        $image_main = $image_path . $cafe->cafeGallery->image_main;
        $subimage_1 = $image_path . $cafe->cafeGallery->subimage_1;
        if (file_exists($image_main) || file_exists($subimage_1)) {
            @unlink($image_main);
            @unlink($subimage_1);
            $cafe->cafeGallery->delete();
        }

        $cafe->delete();
        return redirect()->route('admin/cafe')->with('success', 'ลบข้อมูลร้านคาเฟ่สำเร็จ!');
    }
}
