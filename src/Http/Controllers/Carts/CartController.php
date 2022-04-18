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
     * save batch of cart lines
     * @param Request $request
     * @return CartResource
     */
    public function saveCart(Request $request)
    {
        foreach ($request->get('lines') as $line) {
            $this->addCartLine($line['purchasableId'], (int)$line['quantity']);
        }
        $cart = CartSession::current();
        return new CartResource($cart);
    }

    /**
     * save a single cart line
     * @param Request $request
     * @return CartResource
     */
    public function saveCartLine(Request $request)
    {
        $this->addCartLine($request->get('purchasableId'), (int)$request->get('quantity'));
        $cart = CartSession::current();
        return new CartResource($cart);
    }

    private function addCartLine($purchasableId, int $quantity)
    {
        $productVariant = ProductVariant::find($purchasableId);
        CartSession::add($productVariant, $quantity);
    }

}
