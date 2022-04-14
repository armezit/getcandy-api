<?php

namespace Armezit\GetCandy\Api\Http\Controllers\Orders;

use Armezit\GetCandy\Api\Database\OrderCriteria;
use Armezit\GetCandy\Api\Http\Controllers\BaseController;
use Armezit\GetCandy\Api\Http\Resources\Orders\OrderResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    /**
     * Handles the request to show an order based on it's hashed ID.
     *
     * @param int|string $id order id or reference
     * @param Request $request
     * @param OrderCriteria $criteria
     * @return OrderResource|\Illuminate\Http\JsonResponse
     */
    public function show($id, Request $request, OrderCriteria $criteria)
    {
        try {
            $order = $criteria
                ->include($this->parseIncludes($request->include))
                ->id($id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return $this->errorNotFound();
        }

        return new OrderResource($order);
    }

}
