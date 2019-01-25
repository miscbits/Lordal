<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'auth.staff']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/staff/students');
    }

    public function assessments() {
        return view('assessments');
    }

    public function create_assessment() {
        return view('create_assessment');
    }

    public function students() {
        return view('students');
    }

    public function exams() {
        return view('exams');
    }

    public function quizes() {
        return view('quizes');
    }

    public function labs() {
        return view('labs');
    }

    public function updateAssessment($assessment_id) {
        return view('update_assessment')
            ->with(['assessment_id' => $assessment_id]);
    }

}
