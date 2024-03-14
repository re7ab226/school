<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()

    {
        $data['getRecourd'] = User::getAdmin();

        $data['header_title'] = "admin list  ";
        return view('admin.admin.list', $data);
    }
    public function add()
    {

       $data['header_title'] = "Add New Admin ";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type=1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin Add successfully');
    }
    public function edit($id)
    {
        $data['getRecourd'] = User::getSingle($id);
        if(!empty($data['getRecourd']))
        {
            $data['header_title'] = "edit  Admin ";
            return view('admin.admin.edit', $data);
        }
                else{
                    abort(404);
                }


    }
    public function update( $id ,Request $request){
          // dd($request->all());
          $user =User::getSingle($id);
          $user->name = trim($request->name);
          $user->email = trim($request->email);
          if(empty($request->password))
          {
            $user->password = Hash::make($request->password);
          }

         $user->save();
          return redirect('admin/admin/list')->with('success', 'Admin update successfully');

    }
    public function delete($id)
    {
        $user= User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin deleted successfully');




    }
}
