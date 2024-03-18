<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\class_subject;
use Illuminate\Support\Facades\Auth;


class classsubjectController extends Controller
{

    public function list(Request $request)
    {

        $data['getRecord'] = class_subject::getRecord();
        $data['header_title'] = "Assign  list ";
        return view('admin/classsubject/list', $data);
    }

    public function add()
    {
        $data['header_title'] = " add assign  ";
        $data['getclass'] = ClassModel::getclass();
        $data['getsubject'] = subject::getsubject();
        return view('admin.classsubject.add', $data);
    }
    public function insert(Request $request)
    {

        if (!empty($request->subjects_id)) {

            foreach ($request->subjects_id as $subject_id)
             {
                $getalready=class_subject::getalready($request->class_id, $subject_id);
                if(!empty($getalready))
                  {
                    $getalready->status = $request->status;
                   $getalready->save();
                    }
                else
               {
                $save = new class_subject;
                $save->class_id = $request->class_id;
                $save->subjects_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
               } 
            }
            return redirect(('admin/classsubject/list'))->with('success', 'Assign Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        
        // dd($request->all());




    }

    

    public function delete($id)
  {
      $save= class_subject::getSingle($id);
      $save->is_deleted = 1;
      $save->save();
    //   return redirect('admin/class/list')->with('success', 'Admin deleted successfully');
      return redirect()->back()->with('success', 'Admin deleted successfully');
  }
}
