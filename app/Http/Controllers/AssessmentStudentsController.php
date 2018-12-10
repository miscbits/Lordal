<?php

namespace App\Http\Controllers;

use App\Student;
use App\Assessment;
use Illuminate\Http\Request;

class AssessmentStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function index(Assessment $assessment)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Assessment $assessment)
    {
        $assessment->students()->with('assignments', 'assignments.submission')->get();

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment, Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessment $assessment, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessment  $assessment
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment, Student $student)
    {
        //
    }
}
