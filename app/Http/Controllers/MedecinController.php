<?php

namespace App\Http\Controllers;

use App\Models\spaciality;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function allSpeciality(){
        $specialities = spaciality::get();
        return view ('auth.register' , compact('specialities'));  
    }
}
