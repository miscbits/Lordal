<?php

namespace App\Providers;

use Closure;

class EloquentBuilder extends \Illuminate\Database\Eloquent\Builder
{
    protected function eagerLoadRelation(array $models, $name, Closure $constraints)
    {
        if ($name === 'pivot') {
            $relations = array_filter(array_keys($this->eagerLoad), function ($relation) {
                return $relation != 'pivot' && str_contains($relation, 'pivot');
            });

            $pivots = $this->getModel()->newCollection(
                array_pluck($models, 'pivot')
            );

            $pivots->load(array_map(function ($relation) {
                return substr($relation, strlen('pivot.'));
            }, $relations));

            return $models;
        }

        return parent::eagerLoadRelation($models, $name, $constraints);
    }
}