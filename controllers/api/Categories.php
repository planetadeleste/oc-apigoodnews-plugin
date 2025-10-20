<?php

namespace PlanetaDelEste\ApiGoodNews\Controllers\Api;

use Lovata\GoodNews\Models\Category;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Category\CategoryIndexCollection;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Category\CategoryListCollection;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Category\CategoryShowResource;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategoryListStore;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;

/**
 * Class Categories
 */
class Categories extends Base
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * @return string
     */
    public function getSortColumn(): ?string
    {
        return BlogCategoryListStore::SORT_CREATED_AT_ASC;
    }

    /**
     * @return string
     */
    public function getShowResource(): ?string
    {
        return CategoryShowResource::class;
    }

    /**
     * @return string
     */
    public function getIndexResource(): ?string
    {
        return CategoryIndexCollection::class;
    }

    /**
     * @return string
     */
    public function getListResource(): ?string
    {
        return CategoryListCollection::class;
    }
}
