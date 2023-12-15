<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Auth;
use App\Http\Resources\Website\ProductResource;
use App\Http\Resources\Website\WishlistResource;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Get User Wishlist
     * @return JsonResponse
     */

    public function getUserWishlist()
    {

        $user = auth()->user();
        $wishlistItems = $user->wishlists()->get();
        return ProductResource::collection($wishlistItems);

    }
    /**
     * remove From Wishlist .
     * @param int|string $productId
     */
    public function removeFromWishlist($productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);
        $user->wishlists()->detach($product);
        return new ProductResource($product);
    }
    /**
     *  add To Wishlist .
     * @param int|string $productId
     * @return JsonResponse
     */
    public function addToWishlist($productId)
    {
        $user = auth()->user()->userId;
        $product =Product::findOrFail($productId);
        $product->wishlists()->toggle(auth()->user());
        return ProductResource::collection($product->wishlists()->get());
    }
}
