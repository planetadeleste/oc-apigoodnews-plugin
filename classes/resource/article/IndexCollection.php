<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class IndexCollection
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Article
 */
class IndexCollection extends ResourceCollection
{
    public $collects = ShowResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
