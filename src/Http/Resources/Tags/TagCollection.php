<?php

namespace Armezit\GetCandy\Api\Http\Resources\Tags;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TagCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TagResource::class;
}
