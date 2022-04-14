<?php

namespace Armezit\GetCandy\Api\Http\Resources\Products;

use Armezit\GetCandy\Api\Http\Resources\PurchasablePriceResource;
use Armezit\GetCandy\Api\Traits\HasImages;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{

    use HasImages;

    /**
     * @param $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'backorder' => $this->backorder,
            'shippable' => (bool)$this->shippable,
            'price' => new PurchasablePriceResource($this->resource),
            'factor_tax' => $this->factor_tax,
            'unit_price' => $this->unit_cost,
            'total_tax' => $this->total_tax,
            'unit_tax' => $this->unit_tax,
            'unit_qty' => $this->unit_qty,
            'min_qty' => $this->min_qty,
            'max_qty' => $this->max_qty,
            'min_batch' => $this->min_batch,
            'inventory' => $this->stock,
            'incoming' => $this->incoming,
            'group_pricing' => (bool) $this->group_pricing,
            'weight' => [
                'value' => $this->weight_value,
                'unit' => $this->weight_unit,
            ],
            'height' => [
                'value' => $this->height_value,
                'unit' => $this->height_unit,
            ],
            'width' => [
                'value' => $this->width_value,
                'unit' => $this->width_unit,
            ],
            'depth' => [
                'value' => $this->depth_value,
                'unit' => $this->depth_unit,
            ],
            'volume' => [
                'value' => $this->volume_value,
                'unit' => $this->volume_unit,
            ],
            'option' => $this->getOption(),
            'images' => $this->images(),
        ];
    }

}
