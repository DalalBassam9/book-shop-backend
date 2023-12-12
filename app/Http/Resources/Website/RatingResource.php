<?php

namespace App\Http\Resources\Website;


use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {

        $response = parent::toArray($request);
        $response['review_count'] = $this->count();
        $response['review_sum'] = round($this->sum('rating') / ($this->count()), 1);
        return $response;


    }

}