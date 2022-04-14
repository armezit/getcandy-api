<?php

namespace Armezit\GetCandy\Api\Database;

use GetCandy\Models\Product;

class ProductCriteria extends AbstractCriteria
{
    /**
     * Query on the sku.
     *
     * @var string
     */
    protected $sku;

    /**
     * Gets the underlying builder for the query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        $product = new Product;
        $builder = $product->with($this->includes ?: []);

        $builder->where('status', '=', 'published');

        if ($this->sku) {
            $builder->whereHas('variants', function ($q) {
                $q->where('sku', '=', $this->sku);
            });
        }

        if (count($this->ids)) {
            return $builder->whereIn('id', $product->decodeIds($this->ids));
        }

        if ($this->id) {
            $builder->where('id', '=', $product->decodeId($this->id));

            return $builder;
        }

        return $builder;
    }
}
