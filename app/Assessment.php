<?php

namespace App;

class Assessment extends BaseModel
{
    protected $fillable = ['url', 'name', 'level', 'gradable', 'max_score', 'assigned_date', 'due_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students() {
        return $this->belongsToMany(Student::class, 'assignments')
            ->using(AssignmentPivot::class)
            ->withPivot(['id']);
    }

    public function submissions() {
        return $this->hasManyThrough(Submission::class, Assignment::class);
    }

}
