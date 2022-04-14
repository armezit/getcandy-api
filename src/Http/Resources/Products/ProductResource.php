<?php

namespace Armezit\GetCandy\Api\Http\Resources\Products;

use Armezit\GetCandy\Api\Http\Resources\Channels\ChannelCollection;
use Armezit\GetCandy\Api\Http\Resources\Collections\CollectionCollection;
use Armezit\GetCandy\Api\Http\Resources\Customers\CustomerGroupCollection;
use Armezit\GetCandy\Api\Http\Resources\Tags\TagCollection;
use Armezit\GetCandy\Api\Traits\HasImages;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    use HasImages;

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
            'type' => new ProductTypeResource($this->productType),
            'brand' => $this->brand,
            'status' => $this->status,
            'attributes' => $this->attribute_data,
            'variants' => new ProductVariantCollection($this->whenLoaded('variants')),
            'collections' => new CollectionCollection($this->whenLoaded('collections')),
            'associations' => new ProductAssociationCollection($this->whenLoaded('associations')),
            'channels' => new ChannelCollection($this->whenLoaded('channels')),
            'customer_groups' => new CustomerGroupCollection($this->whenLoaded('customerGroups')),
            'tags' => new TagCollection($this->whenLoaded('tags')),
            'urls' => $this->urls,
            'images' => $this->images(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
