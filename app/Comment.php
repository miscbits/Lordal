<?php

namespace App;

class Comment extends BaseModel
{
    protected $fillable = ['student_id','body','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
