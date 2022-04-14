<?php

namespace Armezit\GetCandy\Api\Http\Resources\Tags;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
        ];
    }
}
