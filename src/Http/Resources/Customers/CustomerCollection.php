<?php

namespace Armezit\GetCandy\Api\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CustomerResource::class;
}
