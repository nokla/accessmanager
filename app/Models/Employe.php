<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'cin', 'status', 'qrcode', 'idSociete'
    ];

    public static $rules=[
        'name'=>'required|string',
        'cin'=>'required|string',
        'status'=>'required|integer',
        'idSociete'=>'nullable|integer'
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
