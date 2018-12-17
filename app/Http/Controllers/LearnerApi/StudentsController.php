<?php

namespace App\Http\Controllers\LearnerApi;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * @param Request $request
     * @return Student student
     */
    public function __invoke(Request $request)
    {
        return $request->student;
    }
}
