<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_spaciality',
        'name',
        'email',
        'password',
        'role',
        'statut',
        
    ];

    public function spaciality(){
        return $this->belongsTo(spaciality::class,'id');
    }
}
