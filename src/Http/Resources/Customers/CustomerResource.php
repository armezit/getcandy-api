<?php

namespace Armezit\GetCandy\Api\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'company_name' => $this->company_name,
            'vat_no' => $this->vat_no,
            'meta' => $this->meta,
            $this->mergeWhen($this->users_count !== null, [
                'users_count' => $this->users_count,
            ]),
            //'customer_groups' => new CustomerGroupCollection($this->whenLoaded('customerGroups')),
            //'users' => new UserCollection($this->whenLoaded('users')),
            //'addresses' => new AddressCollection($this->whenLoaded('addresses')),
        ];
    }

}
