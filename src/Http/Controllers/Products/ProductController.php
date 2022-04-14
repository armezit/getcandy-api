<?php

namespace Armezit\GetCandy\Api\Http\Controllers\Products;

use Armezit\GetCandy\Api\Database\ProductCriteria;
use Armezit\GetCandy\Api\Http\Controllers\BaseController;
use Armezit\GetCandy\Api\Http\Resources\Products\ProductCollection;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    /**
     * Handles the request to show all products.
     *
     * @param \Illuminate\Http\Request $request
     * @param ProductCriteria $criteria
     * @return ProductCollection
     */
    public function index(Request $request, ProductCriteria $criteria)
    {
        $paginate = true;

        if ($request->exists('paginated') && !$request->paginated) {
            $paginate = false;
        }

        $products = $criteria
            ->include($this->parseIncludes($request->include))
            ->ids($request->ids)
            ->limit($request->get('limit', 50))
            ->paginated($paginate)
            ->get();

        return new ProductCollection($products);
    }

}
