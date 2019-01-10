<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class LearnerPages extends Controller
{
    public function profile(Request $request) {
        $user = $request->user();
        $user->student;
        return view('students.profile')
            ->with(['user' => $user]);
    }
}
