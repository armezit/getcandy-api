<?php

namespace Armezit\GetCandy\Api\Http\Resources\Channels;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
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
            'url' => $this->url,
            'default' => (bool)$this->default,
        ];
    }
}
