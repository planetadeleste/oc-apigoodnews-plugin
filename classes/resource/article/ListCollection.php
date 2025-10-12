<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

/**
 * Class ListCollection
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Article
 */
class ListCollection extends IndexCollection
{
    public $collects = ItemResource::class;
}
