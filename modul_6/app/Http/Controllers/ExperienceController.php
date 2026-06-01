<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ExperienceController extends Controller
{
    public function show(string $id){
        $event = Event::findOrFail($id);

        return view('experience.show', [
            'title' => $event->title . ' - Detail Pengalaman',
            'event' => $event
        ]);
    }
}
