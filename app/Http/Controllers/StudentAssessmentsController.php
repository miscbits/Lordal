<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Student;
use Illuminate\Http\Request;

class StudentAssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, Assessment $assessment)
    {
        //
    }
}
