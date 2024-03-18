<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list(){
        $data['getRecord']=ClassModel::getRecord();
        $data['header_title']="class list ";

        return view('admin.class.list',$data);
    }
    public function add(){
        $data['header_title']=" add class list ";

        return view('admin.class.add',$data);
    }
    public function insert(Request $request)
    {
        $save= new ClassModel;
        $save->name=$request->name;
        $save->status=$request->status;
        $save->created_by=Auth::user()->id;
        $save->save();
        return redirect(('admin/class/list'))->with('success','class Added Successfully');
        // dd($request->all());


    }
     
    public function update( $id ,Request $request){
        // dd($request->all());

        $class =ClassModel::getSingle($id);
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->save();
        return redirect('admin/class/list')->with('success', 'Admin update successfully');

  }
  public function delete($id)
  {
      $class= ClassModel::getSingle($id);
      $class->is_deleted = 1;
      $class->save();
    //   return redirect('admin/class/list')->with('success', 'Admin deleted successfully');
      return redirect()->back()->with('success', 'Admin deleted successfully');
  }

}
