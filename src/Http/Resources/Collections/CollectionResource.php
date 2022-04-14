<?php

namespace Armezit\GetCandy\Api\Http\Resources\Collections;

use Armezit\GetCandy\Api\Http\Resources\Attributes\AttributeCollection;
use Armezit\GetCandy\Api\Http\Resources\Products\ProductCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'published_parent' => ['data' => new self($this->whenLoaded('publishedParent'))],
            //'images' => new AssetCollection($this->whenLoaded('assets')),
            'attributes' => new AttributeCollection($this->whenLoaded('attributes')),
            'products' => new ProductCollection($this->whenLoaded('products')),
            //'customer_groups' => new CustomerGroupCollection($this->whenLoaded('customerGroups')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
