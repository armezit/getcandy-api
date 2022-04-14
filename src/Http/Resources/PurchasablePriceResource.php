<?php

namespace Armezit\GetCandy\Api\Http\Resources;

use GetCandy\Base\PricingManagerInterface;
use GetCandy\Base\Purchasable;
use GetCandy\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class PurchasablePriceResource extends JsonResource
{

    /**
     * The resource instance.
     *
     * @var Purchasable
     */
    public $resource;

    /**
     * @param Request $request
     * @return Price
     */
    private function getMatchedPrice(Request $request): Price
    {
        /** @var PricingManagerInterface $pricing */
        $pricing = App::make(PricingManagerInterface::class);

        $user = $request->user();
        if ($user) {
            $pricing->user($user);
        }

        return $pricing->for($this->resource)->get()->matched;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $price = $this->getMatchedPrice($request);

        return [
            'base_price' => new PriceDataTypeResource($price->price),
            'compare_price' => new PriceDataTypeResource($price->compare_price),
        ];
    }

}
