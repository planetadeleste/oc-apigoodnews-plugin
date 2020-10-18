<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class IndexCollection
 *
 * @package PlanetaDelEste\BuilderPortal\Classes\Resource\Category
 */
class IndexCollection extends ResourceCollection
{
    public $collects = ShowResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
