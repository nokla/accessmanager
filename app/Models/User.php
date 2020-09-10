<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','idSociete'
    ];

    protected $visible = ['name', 'email', 'password','idSociete'];

    public static $rules=[
        'name'=>'required|string',
        'email'=>'required|string',
        'password'=>'required|string',
        'idSociete'=>'required|integer'
    ];

    public static $updateRules=[
        'name'=>'required|string',
        'email'=>'required|string',
        'password'=>'nullable|string',
        'idSociete'=>'nullable|integer'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Societe()
    {
        return $this->belongsTo('App\Models\Societe','idSociete');
    }
}
