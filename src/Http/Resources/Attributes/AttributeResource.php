<?php

namespace Armezit\GetCandy\Api\Http\Resources\Attributes;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    public function payload()
    {
        return [
            'id' => $this->encoded_id,
            'name' => $this->name,
            'handle' => $this->handle,
            'position' => (int) $this->position,
            'filterable' => (bool) $this->filterable,
            'scopeable' => (bool) $this->scopeable,
            'translatable' => (bool) $this->translatable,
            'variant' => (bool) $this->variant,
            'searchable' => (bool) $this->searchable,
            'localised' => (bool) $this->translatable,
            'type' => $this->type,
            'required' => (bool) $this->required,
            'lookups' => $this->lookups ?? [],
            'system' => (bool) $this->system,
        ];
    }

    public function includes()
    {
        return [
            'group' => $this->include('group', AttributeGroupResource::class),
        ];
    }
}
