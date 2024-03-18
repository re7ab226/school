<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';
    static public function  getRecord()
    {
        $return = self::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by');
        if (!empty(Request::get('name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('created_at'))) {
            $return = $return->whereDate('class.created_at', 'like', '%' . Request::get('created_at'));
        }
        $return = $return->where('class.is_deleted', '=', 0)
            ->orderBy('class.id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function  getSingle($id)
    {
        return self::find($id);
    }
    static public function  getclass()
    {
        $return = self::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by');
        $return = $return->where('class.is_deleted', '=', 0)
            ->orderBy('class.name', 'asc')
            ->get();
            return $return;
    }
}
