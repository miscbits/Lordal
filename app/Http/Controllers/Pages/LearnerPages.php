<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class LearnerPages extends Controller
{
    public function profile(Request $request) {
        return view('students.profile');
    }

    public function labs() {
        return view('students.labs');
    }

    public function exams() {
        return view('students.exams');
    }

    public function quizes() {
        return view('students.quizes');
    }

}
