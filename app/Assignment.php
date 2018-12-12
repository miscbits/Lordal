<?php

namespace App;

class Assignment extends BaseModel
{
    protected $fillable = ['student_id','assessment_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assessment() {
        return $this->belongsTo(Assessment::class);
    }

    public function submission() {
        return $this->hasOne(Submission::class);
    }
}
