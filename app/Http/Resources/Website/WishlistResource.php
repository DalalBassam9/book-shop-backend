<?php

namespace App\Http\Resources\Website;

use Illuminate\Http\Resources\Json\JsonResource;


class WishlistResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        parent::toArray($request);
    }
}
