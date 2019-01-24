<?php

namespace App\Http\Controllers\LearnerApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnsubmittedLabsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function __invoke(Request $request)
    {
        return array_values($request->user()->student->assessments()
        	->with('pivot.submission')
        	->where('assessments.level', 'Lab')
        	->get()
        	->filter(function($assessment) {
        		return $assessment->pivot->submission == null;
        	})
        	->toArray()
        );
    }

}
