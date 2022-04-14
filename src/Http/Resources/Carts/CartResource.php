<?php

namespace Armezit\GetCandy\Api\Http\Resources\Carts;

use Armezit\GetCandy\Api\Http\Resources\Currencies\CurrencyResource;
use Armezit\GetCandy\Api\Http\Resources\PriceDataTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user_id' => $this->user_id,
            'currency_id' => $this->currency_id,
            'channel_id' => $this->channel_id,
            'order_id' => $this->order_id,
            'coupon_code' => $this->coupon_code,
            'meta' => $this->meta,
            'completed_at' => $this->completed_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'total' => new PriceDataTypeResource($this->total),
            'sub_total' => new PriceDataTypeResource($this->subTotal),
            'discount_total' => new PriceDataTypeResource($this->discountTotal),
            'tax_amount' => new PriceDataTypeResource($this->taxAmount),
            'tax_breakdown' => $this->taxBreakdown,
            'currency' => new CurrencyResource($this->whenLoaded('currency')),
            'lines' => new CartLineCollection($this->whenLoaded('lines')),
//            'discounts' => new DiscountCollection($this->whenLoaded('discounts')),
//            'order' => ['data' => new OrderResource($this->whenLoaded('order'))],
        ];
    }

}
