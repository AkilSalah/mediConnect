<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spaciality extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_spaciality',
        'specialityName',
    ];

    public function doctors(){
        return $this->hasMany(Doctors::class,'id');
    }
}

