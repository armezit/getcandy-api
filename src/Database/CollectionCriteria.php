<?php

namespace Armezit\GetCandy\Api\Database;

use GetCandy\Models\Collection;

class CollectionCriteria extends AbstractCriteria
{
    /**
     * Gets the underlying builder for the query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        $collection = new Collection;

        $builder = $collection->with($this->includes ?: []);

        if ($this->id) {
            $builder->where('id', '=', $this->id);
            return $builder;
        }

        return $builder;
    }
}
