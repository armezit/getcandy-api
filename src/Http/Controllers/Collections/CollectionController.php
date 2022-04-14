<?php

namespace Armezit\GetCandy\Api\Http\Controllers\Collections;

use Armezit\GetCandy\Api\Database\CollectionCriteria;
use Armezit\GetCandy\Api\Http\Controllers\BaseController;
use Armezit\GetCandy\Api\Http\Resources\Collections\CollectionCollection;
use Armezit\GetCandy\Api\Http\Resources\Collections\CollectionResource;
use GetCandy\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends BaseController
{

    /**
     * Returns a listing of collections.
     *
     * @param \Illuminate\Http\Request $request
     * @param CollectionCriteria $criteria
     * @return CollectionCollection
     */
    public function index(Request $request, CollectionCriteria $criteria)
    {
        $collection = $criteria
            ->include($request->include)
            ->limit($request->per_page)
            ->get();

        return new CollectionCollection($collection);
    }

    /**
     * Handles the request to show a collection based on it's hashed ID.
     *
     * @param string $id
     * @param \Illuminate\Http\Request $request
     * @param CollectionCriteria $criteria
     * @return CollectionResource|\Illuminate\Http\JsonResponse
     */
    public function show($id, Request $request, CollectionCriteria $criteria)
    {
        $includes = $request->include ?: [];

        if ($includes && is_string($includes)) {
            $includes = $this->parseIncludes($includes);
        }

        if (!$id) {
            return $this->errorNotFound();
        }

        $collection = Collection::with($includes)->find($id);

        if (!$collection) {
            return $this->errorNotFound();
        }

        return new CollectionResource($collection);
    }

}
