<?php

namespace Armezit\GetCandy\Api\Http\Resources\Attributes;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AttributeGroupCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = AttributeGroupResource::class;

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
