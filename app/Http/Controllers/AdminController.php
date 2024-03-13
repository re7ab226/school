<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['header_title'] = "admin list  ";
        return view('admin.admin.list', $data);
    }
    public function add()
    {
        $data['getRecord']=User::getAdmin();
        $data['header_title'] = "Add New Admin ";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type=1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin Add successfully');
    }
}
