<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $users = User::all();
        return view('user.edit',  compact('user', 'users'));
    }

    public function update(Request $request, $id){

        // dd($request->all());
        $user = User::findOrFail($id);
        $user->type = $request->user_type == "user" ? "0" : "1";

        $user->save();
        return redirect()->route('admin/user')->with('success', 'อัพเดตข้อมูลผู้ใช้สำเร็จ!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin/user')->with('success', 'ลบข้อมูลผู้ใช้สำเร็จ!');
    }
    
    public function profilepage()
    {
        return view('profile');
    }
}
