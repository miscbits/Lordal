<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','cell_number','email','github_id','github_username','zipcode_rocks_username','section'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assessments() {
        return $this->belongsToMany(Assessment::class)
            ->using(Assignment::class)
            ->withPivot([
                'created_by',
                'updated_by'
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function submissions() {
        return $this->hasManyThrough(Submission::class, Assignment::class);
    }
}
