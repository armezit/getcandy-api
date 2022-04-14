<?php

namespace Armezit\GetCandy\Api\Http\Resources\Attributes;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeGroupResource extends JsonResource
{
    public function payload()
    {
        return [
            'id' => $this->encoded_id,
            'name' => $this->name,
            'handle' => $this->handle,
            'position' => (int) $this->position,
        ];
    }

    public function includes()
    {
        return [
            'attributes' => new AttributeCollection($this->whenLoaded('attributes')),
        ];
    }
}
