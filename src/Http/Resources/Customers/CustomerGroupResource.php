<?php

namespace Armezit\GetCandy\Api\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerGroupResource extends JsonResource
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'handle' => $this->handle,
            'default' => (bool)$this->default,
            'customers' => new CustomerCollection($this->whenLoaded('customers')),
        ];
    }

}
