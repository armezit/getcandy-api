<?php

namespace Armezit\GetCandy\Api\Http\Resources\Products;

use Armezit\GetCandy\Api\Http\Resources\Associations\AssociationGroupResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAssociationResource extends JsonResource
{
    public function payload()
    {
        return [
            'id' => $this->encoded_id,
        ];
    }

    public function includes()
    {
        return [
            'association' => ['data' => new ProductResource($this->whenLoaded('association'), $this->only)],
            'group' => ['data' => new AssociationGroupResource($this->whenLoaded('group'), $this->only)],
        ];
    }
}
