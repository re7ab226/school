<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class class_subject extends Model
{
    use HasFactory;
    protected $table = 'class_subject';
    static public function  getRecord()
    {
        $return= self::select(
            'class_subject.*',
            'class.name as class_name',
            'school_subjects.name as school_subjects_name',
            'users.name as created_by_name'
        )
        ->join('school_subjects', 'school_subjects.id', '=', 'class_subject.subjects_id')
        ->join('class', 'class.id', '=', 'class_subject.class_id')
        ->join('users', 'users.id', 'class.created_by');

        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('school_subjects_name'))) {
            $return = $return->where('school_subjects.name', 'like', '%' . Request::get('school_subjects_name') . '%');
        }
        if (!empty(Request::get('created_at'))) {
            $return = $return->whereDate('class_subject.created_at', 'like', '%' . Request::get('created_at'));
        }
            $return = $return->where('class_subject.is_deleted', '=', 0)
            ->orderBy('class_subject.id', 'desc')
            ->paginate(10);
            return $return;
    }
    static public function getalready($class_id, $subject_id)
    {
        return self::where('class_id', '=', $class_id)->where('subjects_id', '=', $subject_id)->first();
    }
    static public function  getSingle($id)
    {
        return self::find($id);
    }
}
