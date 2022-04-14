<?php

namespace Armezit\GetCandy\Api\Http\Resources\Associations;

use Illuminate\Http\Resources\Json\JsonResource;

class AssociationGroupResource extends JsonResource
{
    public function payload()
    {
        return [
            'id' => $this->encoded_id,
            'name' => $this->name,
            'handle' => $this->handle,
        ];
    }
}
