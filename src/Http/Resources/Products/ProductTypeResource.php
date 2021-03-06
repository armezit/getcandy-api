<?php

namespace Armezit\GetCandy\Api\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

}
