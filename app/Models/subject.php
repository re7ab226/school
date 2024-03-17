<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subject extends Model
{
    use HasFactory;
    protected $table = 'school_subjects';
    static public function  getRecord()
    {
        $return= self::select('school_subjects.*','users.name as created_by_name')
        ->join('users', 'users.id', 'school_subjects.created_by');
        if (!empty(Request::get('name')))
        {
            $return = $return->where('school_subjects.name','like','%'.Request::get('name').'%');
        }
        if (!empty(Request::get('created_at')))
        {
            $return = $return->whereDate('school_subjects.created_at','like','%'.Request::get('created_at'));
        }
        $return = $return->where('school_subjects.is_deleted', '=', 0)
        ->orderBy('school_subjects.id', 'desc')
        ->paginate(5);

        return $return;
    }
    static public function  getSingle($id)
    {
        return self::find($id);
    }

}
