<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'dScan', 'idEmploye'
    ];

    public function Employe()
    {
        return $this->belongsTo('App\Models\Employe','idEmploye');
    }
}
