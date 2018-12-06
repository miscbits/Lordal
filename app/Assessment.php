<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['url', 'name', 'level', 'gradable', 'max_score', 'assigned_date', 'due_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function submissions() {
        return $this->belongsToMany(Student::class, 'assignments');
    }
}
