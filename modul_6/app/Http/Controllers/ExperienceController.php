<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function show(string $slug){
        return view('experience.show', compact('slug'));
    }
}
