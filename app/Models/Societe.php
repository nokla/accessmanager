<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','activite','telephone1','telephone2','adresse','interlocuteur','remarque'
    ];

    public static $rules=[
        'name'=>'required|string',
        'activite'=>'required|string',
        'telephone1'=>'required|digits_between:10,14',
        'telephone2'=>'required|digits_between:10,14',
        'adresse'=>'required|string',
        'interlocuteur'=>'required|string',
        'remarque'=>'required|string',
    ];

    public function Employes(){
        return $this->hasMany('App\Models\Employe','idSociete','id');
    }

    public function Users(){
        return $this->hasMany('App\Models\User','idSociete','id');
    }
}
