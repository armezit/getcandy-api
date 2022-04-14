<?php

namespace Armezit\GetCandy\Api\Http\Resources\Carts;

use Armezit\GetCandy\Api\Http\Resources\PriceDataTypeResource;
use Armezit\GetCandy\Api\Http\Resources\Products\ProductVariantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartLineResource extends JsonResource
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
            'purchasable' => new ProductVariantResource($this->purchasable),
            'quantity' => $this->quantity,
            'meta' => $this->meta,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'total' => new PriceDataTypeResource($this->total),
            'sub_total' => new PriceDataTypeResource($this->subTotal),
            'discount_total' => new PriceDataTypeResource($this->discountTotal),
            'tax_amount' => new PriceDataTypeResource($this->taxAmount),
            'taxBreakdown' => $this->taxBreakdown,
        ];
    }

}
