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

    public function Societe()
    {
        return $this->belongsTo('App\Models\Societe','idSociete');
    }
}
