<?php

namespace Armezit\GetCandy\Api\Http\Resources\Orders;

use Armezit\GetCandy\Api\Http\Resources\PriceDataTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'status' => $this->status,
            'total' => new PriceDataTypeResource($this->total),
            'sub_total' => new PriceDataTypeResource($this->sub_total),
            'discount_total' => new PriceDataTypeResource($this->discount_total),
            'shipping_total' => new PriceDataTypeResource($this->shipping_total),
            'tax_total' => new PriceDataTypeResource($this->tax_total),
            'tax_breakdown' => $this->tax_breakdown,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'placed_at' => $this->placed_at,
            'notes' => $this->notes,
            'meta' => $this->meta,
            'lines' => new OrderLineCollection($this->whenLoaded('lines')),
        ];
    }

}
