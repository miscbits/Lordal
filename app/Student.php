<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','cell_number','email','github_id','github_username','zipcode_rocks_username','section'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function assessments() {
        return $this->belongsToMany(Assessment::class, 'assignments');
    }
}
