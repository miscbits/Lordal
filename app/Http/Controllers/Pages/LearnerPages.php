<?php

namespace App\Http\Controllers\Pages;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class LearnerPages extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'auth.student']);
    }

    public function profile(Request $request) {
        return view('students.profile');
    }

    public function labs() {
        return view('students.labs');
    }

    public function exams() {
        return view('students.exams');
    }

    public function quizzes() {
        return view('students.quizzes');
    }

    public function submission(Request $request, $assignment_id) {
        $assignment = Assignment::with('assessment')->find($assignment_id);

        $user = $request->user();
        if ($user->student->id != $assignment->student_id) {
            toastr()->error('Assignment not found');
            return back();
        }
        return view('students.submission')
            ->with(compact('assignment'));
    }

}
