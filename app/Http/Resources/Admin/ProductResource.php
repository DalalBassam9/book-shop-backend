<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'productId' => $this->productId,
            'name'  => $this->name,
            'description' => $this->description,
            'price'=> $this->price,
            'quantity'=>$this->price,
            'categoryId'=> $this->categoryId,
            'image' => asset('storage/' . $this->image),
        ];
    }
}
