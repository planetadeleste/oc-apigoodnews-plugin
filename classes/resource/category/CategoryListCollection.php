<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

/**
 * Class CategoryListCollection
 */
class CategoryListCollection extends CategoryIndexCollection
{
    public $collects = CategoryItemResource::class;
}
