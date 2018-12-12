<?php

namespace App;

use App\Pivots\AssignmentPivot;

class Student extends BaseModel
{
    protected $fillable = ['name','cell_number','email','github_id','github_username','zipcode_rocks_username','section'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assessments() {
        return $this->belongsToMany(Assessment::class, 'assignments')
            ->using(AssignmentPivot::class)
            ->withPivot(['id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function submissions() {
        return $this->hasManyThrough(Submission::class, Assignment::class);
    }
}
