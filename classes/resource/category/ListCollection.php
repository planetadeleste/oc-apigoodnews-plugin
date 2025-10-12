<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

/**
 * Class ListCollection
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Category
 */
class ListCollection extends IndexCollection
{
    public $collects = ItemResource::class;
}
