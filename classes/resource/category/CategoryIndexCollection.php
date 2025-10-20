<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class CategoryIndexCollection
 */
class CategoryIndexCollection extends ResourceCollection
{
    public $collects = CategoryShowResource::class;

    /**
     * @param mixed $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request): \Illuminate\Support\Collection
    {
        return $this->collection;
    }
}
