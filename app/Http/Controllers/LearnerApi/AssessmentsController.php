<?php

namespace App\Http\Controllers\LearnerApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessmentsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function __invoke(Request $request)
    {
        return $request->user()->student->assessments;
    }
}
