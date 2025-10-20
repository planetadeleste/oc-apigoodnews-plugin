<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ArticleIndexCollection
 */
class ArticleIndexCollection extends ResourceCollection
{
    public $collects = ArticleShowResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
