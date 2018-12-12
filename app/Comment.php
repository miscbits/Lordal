<?php

namespace App;

class Comment extends BaseModel
{
    protected $fillable = ['student_id','body','note_taker'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
