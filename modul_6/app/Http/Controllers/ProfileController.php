<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::with([
            'hobbies',
            'skills',
            'events' => function ($query) {
                $query->orderByDesc('date')->take(4);
            }
        ])->firstOrFail();

        return view('profile', [
            'title' => 'Profile - ' . $user->name,
            'user' => $user
        ]);
    }
}
