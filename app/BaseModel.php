<?php

namespace App;

use App\Providers\EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newEloquentBuilder($query)
    {
        return new EloquentBuilder($query);
    }
}

