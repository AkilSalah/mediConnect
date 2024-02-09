<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Patient extends User
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
}
