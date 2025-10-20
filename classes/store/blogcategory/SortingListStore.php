<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategory;

use Lovata\GoodNews\Models\Category;
use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\SortingListTrait;

class SortingListStore extends AbstractStoreWithParam
{
    use SortingListTrait;

    protected static $instance;

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }
}
