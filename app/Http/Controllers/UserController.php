<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function about()
    {
        return view('about');
    }

    public function allCafe()
    {
        $cafes = Cafe::orderBy('created_at', 'desc')->get();
        return view('allCafe', compact('cafes'));
    }

    public function search()
    {
        $streetCategories = Cafe::where('street')->distinct()->get();
        $districtCategories = Cafe::where('district')->distinct()->get();
        $subDistrictCategories = Cafe::where('sub_district')->distinct()->get();
        $services = Service::all();
        $cafes = null;

        return view('search', compact('streetCategories', 'districtCategories', 'subDistrictCategories', 'cafes', 'services'));
    }

    public function searchCafe(Request $request)
    {
        $streetCategories = Cafe::select('street')
            ->whereNotNull('street')
            ->where('street', '<>', '')
            ->distinct()
            ->get();
        $districtCategories = Cafe::select('district')
            ->whereNotNull('district')
            ->where('district', '<>', '')
            ->distinct()
            ->get();
        $subDistrictCategories = Cafe::select('sub_district')
            ->whereNotNull('sub_district')
            ->where('sub_district', '<>', '')
            ->distinct()
            ->get();
        $services = Service::all();

        $keyword = $request->keyword;
        $filterKeywords = $request->filter_keyword;

        // เริ่มต้นด้วยการ query ข้อมูล cafes โดยไม่มีเงื่อนไข
        $query = Cafe::with('services');

        // ตรวจสอบว่ามี keyword ที่รับมาหรือไม่
        if ($keyword != null && $keyword != '') {
            $query->where('name_th', 'like', "%$keyword%")
                ->orWhere('name_en', 'like', "%$keyword%")->get();
        }

        // ตรวจสอบว่ามี filterKeywords ที่รับมาหรือไม่
        if ($filterKeywords != null && count($filterKeywords) > 0) {
            $query->where(function ($q) use ($filterKeywords) {
                foreach ($filterKeywords as $filter) {
                    $q->orWhere('street', 'like', "%$filter%")
                        ->orWhere('district', 'like', "%$filter%")
                        ->orWhere('sub_district', 'like', "%$filter%")
                        ->orWhereHas('services', function ($query) use ($filter) {
                            $query->where('name', 'like', "%$filter%")
                                ->where('service_status', true);
                        });
                }
            });
        }

        // ถ้าไม่มี keyword และไม่มี filterKeywords ให้กำหนด cafes เป็นค่าว่าง
        if (empty($keyword) && empty($filterKeywords)) {
            $cafes = [];
        } else {
            $cafes = $query->get();
        }

        return view('search', compact('streetCategories', 'districtCategories', 'subDistrictCategories', 'cafes', 'services', 'keyword'));
    }

    public function detail($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafeRandoms = Cafe::inRandomOrder()->limit(4)->get();
        $cafeServices = $cafe->cafeServices;
        return view('detail', compact('cafe', 'cafeRandoms', 'cafeServices'));
    }

    public function userprofile()
    {
        return view('userprofile');
    }
}
