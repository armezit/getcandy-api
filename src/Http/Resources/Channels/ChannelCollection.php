<?php

namespace Armezit\GetCandy\Api\Http\Resources\Channels;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChannelCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ChannelResource::class;
}
