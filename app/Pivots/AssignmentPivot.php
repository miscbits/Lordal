<?php

namespace App\Pivots;

use App\Submission;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignmentPivot extends Pivot
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function submission() {
        return $this->hasOne(Submission::class, 'assignment_id', 'id');
    }
}