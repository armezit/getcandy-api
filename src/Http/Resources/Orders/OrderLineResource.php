<?php

namespace Armezit\GetCandy\Api\Http\Resources\Orders;

use Armezit\GetCandy\Api\Http\Resources\PriceDataTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLineResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'purchasable_id' => $this->purchasable_id,
            //'purchasable' => new ProductVariantResource($this->purchasable),
            'type' => $this->type,
            'description' => $this->description,
            'option' => $this->option,
            'identifier' => $this->identifier,
            'unit_price' => new PriceDataTypeResource($this->unit_price),
            'unit_quantity' => $this->unit_quantity,
            'quantity' => $this->quantity,
            'total' => new PriceDataTypeResource($this->total),
            'sub_total' => new PriceDataTypeResource($this->sub_total),
            'discount_total' => new PriceDataTypeResource($this->discount_total),
            'tax_total' => new PriceDataTypeResource($this->tax_total),
            'tax_breakdown' => $this->tax_breakdown,
            'notes' => $this->notes,
            'meta' => $this->meta,
        ];

        return $data;
    }

}
