<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use \Yajra\Datatables\Datatables;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword != null && $keyword != "") {
            $services = Service::where('name', 'like', "%$keyword%")->get();
        } else {
            $services = Service::all();
        }
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'กรุณากรอกชื่อบริการ',
            ]
        );

        $service = new Service();
        $service->name = $request->name;

        $service->save();
        return redirect()->route('admin/service')->with('success', 'เพิ่มข้อมูลบริการสำเร็จ!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'กรุณากรอกชื่อบริการ',
            ]
        );

        $service = Service::findOrFail($id);
        $service->name = $request->name;

        $service->save();
        return redirect()->route('admin/service')->with('success', 'อัพเดตข้อมูลบริการสำเร็จ!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin/service')->with('success', 'ลบข้อมูลบริการสำเร็จ!');
    }
}
