<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'cin', 'status', 'qrcode', 'idSociete',
        'prenom',
        'telephone1',
        'telephone2',
        'email',
        'adresse',
        'birthdate',
        'nationalite',
        'sexe',
        'situation',
        'raison',
        'etatcovid'
    ];

    public static $rules=[
        'name'=>'required|string',
        'cin'=>'required|string',
        'status'=>'required|integer',
        'idSociete'=>'nullable|integer',
        'prenom'=>'nullable|string',
        'telephone1'=>'nullable|digits_between:10,14',
        'telephone2'=>'nullable|digits_between:10,14',
        'email'=>'nullable|email',
        'adresse'=>'nullable|string',
        'birthdate'=>'nullable|date',
        'nationalite'=>'nullable|string',
        'sexe'=>'nullable|string',
        'situation'=>'nullable|string',
        'raison'=>'nullable|string',
        'etatcovid'=>'required|integer'
    ];

    public static $updateRules=[
        'name'=>'required|string',
        'cin'=>'required|string',
        'status'=>'nullable|integer',
        'idSociete'=>'nullable|integer'
    ];

    public function Societe()
    {
        return $this->belongsTo('App\Models\Societe','idSociete');
    }

    public function History(){
        return $this->hasMany('App\Models\History','idEmploye','id');
    }
}
