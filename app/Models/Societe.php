<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static $rules=[
        'name'=>'required|string'
    ];

    public function Employes(){
        return $this->hasMany('App\Models\Employe','idSociete','id');
    }

    public function Users(){
        return $this->hasMany('App\Models\User','idSociete','id');
    }
}
