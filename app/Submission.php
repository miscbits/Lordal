<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends BaseModel
{
    protected $fillable = ['submission_url','latest_hash','assignment_id', 'grade', 'grader_output'];

    public function assessment() {
        return $this->belongsTo(Assignment::class);
    }
}
