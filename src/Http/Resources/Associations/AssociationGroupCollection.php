<?php

namespace Armezit\GetCandy\Api\Http\Resources\Associations;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AssociationGroupCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = AssociationGroupResource::class;

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
