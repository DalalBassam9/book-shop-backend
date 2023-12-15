<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\Website\RatingResource;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function getProductRatings($productId)
    {
        $product  = Product::findOrFail($productId);
        $ratings = Rating::where('productId', $product)->orderBy('created_at', 'desc')->get();
        return RatingResource::collection($ratings);
    }

    public function getUserRatings()
    {
        $ratings = Rating::where('userId', auth()->user()->userId)->orderBy('created_at', 'desc')->get();
        return RatingResource::collection($ratings);
    }

    public function store(RatingRequest $request,$productId)
    {
        $rating = Rating::create([
            'productId' => $productId,
            'userId'   => auth()->user()->userId,
            'rating'   => $request->rating,
            'review'    => $request->review,
        ]);

        return new RatingResource($rating);
    }
}
