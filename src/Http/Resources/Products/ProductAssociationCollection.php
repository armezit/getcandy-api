<?php

namespace Armezit\GetCandy\Api\Http\Resources\Products;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductAssociationCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ProductAssociationResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
