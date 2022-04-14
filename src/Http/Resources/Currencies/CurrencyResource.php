<?php

namespace Armezit\GetCandy\Api\Http\Resources\Currencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    public function payload()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'enabled' => (bool)$this->enabled,
            'format' => $this->format,
            'decimal_point' => $this->decimal_point,
            'thousand_point' => $this->thousand_point,
            'exchange_rate' => $this->exchange_rate,
            'default' => (bool)$this->default,
        ];
    }
}
