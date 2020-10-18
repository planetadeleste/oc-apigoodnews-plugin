<?php namespace PlanetaDelEste\ApiGoodNews\Controllers\Api;

use Lovata\GoodNews\Models\Category;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategoryListStore;

/**
 * Class Categories
 *
 * @package PlanetaDelEste\BuilderPortal\Controllers\Api
 */
class Categories extends Base
{
    public $sortColumn = BlogCategoryListStore::SORT_CREATED_AT_ASC;

    protected function save()
    {
        if (!array_get($this->data, 'slug') && ($sName = array_get($this->data, 'name'))) {
            array_set($this->data, 'slug', str_slug($sName));
        }
        return parent::save();
    }

    public function getModelClass()
    {
        return Category::class;
    }
}
