<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function  getAdmin()
    {
        $return= self::select('users.*')
        ->where('user_type', '=', 1)
        ->where('is_delete', '=', 0);
    if (!empty(Request::get('email')))
    {
        $return = $return->where('email','like','%'.Request::get('email').'%');
    }
    if (!empty(Request::get('name')))
    {
        $return = $return->where('name','like','%'.Request::get('name').'%');
    }
    if (!empty(Request::get('created_at')))
    {
        $return = $return->whereDate('created_at','like','%'.Request::get('created_at').'%');
    }
        $return=$return ->orderBy('id', 'desc')
        // ->get()
        ->paginate(8);
        return $return;
    }




    static public function  getSingle($id)
    {
        return self::find($id);
    }


    static public function  getEmailSingle($email)
    {
        return  User::where('email', $email)->first();
    }
    static public function  getTokenSingle($remember_token)
    {
        return  User::where('remember_token', $remember_token)->first();
    }


}
