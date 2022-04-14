<?php

namespace Armezit\GetCandy\Api\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceDataTypeResource extends JsonResource
{

    /**
     * The resource instance.
     *
     * @var \GetCandy\DataTypes\Price
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'value' => $this->resource->value,
            'decimal' => $this->resource->decimal,
            'formatted' => $this->resource->formatted(),
        ];
    }

}
