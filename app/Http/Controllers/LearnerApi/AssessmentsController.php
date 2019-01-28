<?php

namespace App\Http\Controllers\LearnerApi;

use Carbon\Carbon;
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
        return $request->user()->student->assessments()
        	->where('assigned_date', '<', Carbon::now())
        	->with('pivot.submission')->get()->groupBy('level');
    }
}
