<?php

namespace Armezit\GetCandy\Api\Traits;

trait HasImages
{

    /**
     * Mount the component trait.
     *
     * @return array
     */
    public function images(): array
    {
        $conversions = array_keys(config('getcandy.media.transformations', []));

        return $this->media->map(function ($media) use ($conversions) {
            $output = [
                'position' => $media->getCustomProperty('position', 1),
                'caption' => $media->getCustomProperty('caption'),
                'primary' => $media->getCustomProperty('primary'),
                'original' => $media->getFullUrl(),
            ];
            foreach ($conversions as $conversion) {
                $output[$conversion] = $media->getFullUrl($conversion);
            }
            return $output;
        })->sortBy('position')->values()->toArray();
    }

}
