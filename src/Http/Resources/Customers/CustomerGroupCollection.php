<?php

namespace Armezit\GetCandy\Api\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerGroupCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CustomerGroupResource::class;
}
