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
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function index($student_id)
    {
        return response()
            ->json(Student::with("assessments.pivot.submission")
                ->with("user")
                ->find($student_id)
            );
    }

}
