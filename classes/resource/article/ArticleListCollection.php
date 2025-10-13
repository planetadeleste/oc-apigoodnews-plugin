<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

/**
 * Class ListCollection
 */
class ArticleListCollection extends ArticleIndexCollection
{
    public $collects = ArticleItemResource::class;
}
