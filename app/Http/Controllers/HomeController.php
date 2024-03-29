<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->only('adminHome');
    }

    public function index()
    {
        // $cafes = Cafe::all();
        $cafesRecommend = Cafe::limit(12)->get();
        $cafesInterest = Cafe::inRandomOrder()->limit(4)->get();
        return view('home', compact('cafesRecommend', 'cafesInterest'));
    }

    public function adminHome()
    {
        $cafes = Cafe::orderBy('created_at', 'desc')->take(5)->get();
        $userCount = User::all()->count();
        $cafeCount = Cafe::all()->count();
        $serviceCount = Service::all()->count();
        return view('dashboard', compact('cafes','userCount', 'cafeCount', 'serviceCount'));
    }
}
