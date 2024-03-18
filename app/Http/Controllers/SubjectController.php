<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {

        $data['getRecord'] = subject::getRecord();
        $data['header_title'] = "subject list ";
        return view('admin.subjects.list', $data);
    }
    public function add()
    {
        $data['header_title'] = " add subjects  ";
        return view('admin.subjects.add', $data);
    }
    public function insert(Request $request)
    {
        $save = new subject;
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect(('admin/subjects/list'))->with('success', 'class Added Successfully');
        // dd($request->all());


    }
    public function edit($id)
    {

        $data['getRecord'] = subject::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['header_title'] = " Edit subject  ";
            return view('admin.subjects.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        // dd($request->all());

        $class = subject::getSingle($id);
        $class->name = trim($request->name);
        $class->type = trim($request->type);
        $class->status = trim($request->status);
        $class->save();
        return redirect('admin/subjects/list')->with('success', 'subject update successfully');
    }
    public function delete($id)
    {
        $class = subject::getSingle($id);
        $class->is_deleted = 1;
        $class->save();
        //   return redirect('admin/class/list')->with('success', 'Admin deleted successfully');
        return redirect()->back()->with('success', 'subject deleted successfully');
    }
}
