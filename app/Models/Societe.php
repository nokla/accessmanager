<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','activite','telephone1','telephone2','adresse','interlocuteur','remarque','tStarts'
    ];

    public static $rules=[
        'name'=>'required|string',
        'activite'=>'nullable|string',
        'telephone1'=>'nullable|digits_between:10,14',
        'telephone2'=>'nullable|digits_between:10,14',
        'adresse'=>'nullable|string',
        'interlocuteur'=>'nullable|string',
        'remarque'=>'nullable|string',
        'tStarts'=>'required|date_format:H:i',
    ];

    public static $UpdateRules=[
        'name'=>'required|string',
        'activite'=>'nullable|string',
        'telephone1'=>'nullable|digits_between:10,14',
        'telephone2'=>'nullable|digits_between:10,14',
        'adresse'=>'nullable|string',
        'interlocuteur'=>'nullable|string',
        'remarque'=>'nullable|string',
        'tStarts'=>'required|date_format:H:i',
    ];

    public function Employes(){
        return $this->hasMany('App\Models\Employe','idSociete','id');
    }

    public function Users(){
        return $this->hasMany('App\Models\User','idSociete','id');
    }
}
