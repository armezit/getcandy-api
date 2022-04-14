<?php

namespace Armezit\GetCandy\Api\Http\Controllers\Carts;

use Armezit\GetCandy\Api\Http\Controllers\BaseController;
use Armezit\GetCandy\Api\Http\Resources\Carts\CartResource;
use GetCandy\Facades\CartSession;
use GetCandy\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends BaseController
{

    /**
     * Handles the request to get cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return CartResource|array
     */
    public function index(Request $request)
    {
        $cart = CartSession::current();
        return $cart ? new CartResource($cart) : [];
    }

    /**
     * @param Request $request
     * @return CartResource
     */
    public function add(Request $request)
    {
        $productVariant = ProductVariant::find($request->get('purchasableId'));
        $quantity = (int)$request->get('quantity');

        CartSession::add($productVariant, $quantity);

        $cart = CartSession::current();
        return new CartResource($cart);
    }

}
