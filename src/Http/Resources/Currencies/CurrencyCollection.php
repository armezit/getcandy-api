<?php

namespace Armezit\GetCandy\Api\Http\Resources\Currencies;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CurrencyCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CurrencyResource::class;
}
