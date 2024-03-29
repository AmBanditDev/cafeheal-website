<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\CafeService;
use App\Models\Service;
use Illuminate\Http\Request;

class CafeServiceController extends Controller
{
    public function index()
    {
        $cafes = Cafe::with('services')->get();
        $checkCafeService = CafeService::all()->count();
        $cafeServicesCount = $this->countCafeService($cafes);

        // dd($checkCafeService);
        return view('cafe_service.index', compact('cafes', 'checkCafeService', 'cafeServicesCount'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword != null && $keyword != "") {
            $cafes = Cafe::where('name_th', 'like', "%$keyword%")
            ->orWhere('name_en', 'like', "%$keyword%")
            ->get();
        } else {
            $cafes = Cafe::with('services')->get();
        }
        
        $cafeServicesCount = $this->countCafeService($cafes);

        return view('cafe_service.index', compact('cafes', 'cafeServicesCount'));
    }

    public function create()
    {
        $cafes = Cafe::all();
        $services = Service::all();
        $cafesData = Cafe::with('services')->get();
        return view('cafe_service.create', compact('cafes', 'services', 'cafesData'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'cafe_id' => 'required',
                'service_id' => 'required|unique:cafe_services,service_id,NULL,id,cafe_id,' . $request->cafe_id,
                'service_status' => 'required',
            ],
            [
                'cafe_id.required' => 'กรุณาเลือกชื่อร้านคาเฟ่',
                'service_id.required' => 'กรุณาเลือกบริการร้านคาเฟ่',
                'service_id.unique' => 'บริการนี้มีอยู่แล้วในร้านคาเฟ่ กรุณาเลือกบริการใหม่',
                'service_status.required' => 'กรุณาเลือกสถานะการบริการ',
            ]
        );

        $cafeService = new CafeService();
        $cafeService->cafe_id = $request->cafe_id;
        $cafeService->service_id = $request->service_id;
        $cafeService->service_status = $request->service_status;

        $cafeService->save();
        return redirect()->route('admin/cafe-service')->with('success', 'เพิ่มข้อมูลบริการของร้านคาเฟ่สำเร็จ!');
    }

    public function edit($id)
    {
        // ค้นหา CafeService ที่ต้องการแก้ไขตาม $id
        $cafeService = CafeService::findOrFail($id);

        // ดึงข้อมูล Cafe และ Service ทั้งหมด
        $cafes = Cafe::all();
        $services = Service::all();

        return view('cafe_service.edit', compact('cafeService', 'cafes', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_status' => 'required',
        ]);

        // ค้นหา CafeService ที่ต้องการอัปเดตตาม $id
        $cafeService = CafeService::findOrFail($id);

        // ทำการอัปเดตค่า service_status
        $cafeService->service_status = $request->service_status;

        // บันทึกการเปลี่ยนแปลง
        $cafeService->save();

        // Redirect หรือส่งข้อความกลับไปยังผู้ใช้งาน
        return redirect()->route('admin/cafe-service')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        // ค้นหา CafeService ที่ต้องการลบ
        $cafeService = CafeService::findOrFail($id);

        // ทำการลบ CafeService
        $cafeService->delete();

        return redirect()->route('admin/cafe-service')->with('success', 'ลบข้อมูลบริการของร้านคาเฟ่สำเร็จ!');
    }

    function countCafeService($cafes) {
        $cafeServicesCount = 0;
        foreach ($cafes as $cafe) {
            $cafeServicesCount += $cafe->cafeServices->count();
        }
    
        return $cafeServicesCount;
    }
}
