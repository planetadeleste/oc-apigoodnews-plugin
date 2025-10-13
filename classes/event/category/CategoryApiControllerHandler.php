<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Event\Category;

use Lovata\GoodNews\Models\Category;
use PlanetaDelEste\ApiGoodNews\Controllers\Api\Categories;
use PlanetaDelEste\ApiToolbox\Classes\Event\ApiControllerHandler;

class CategoryApiControllerHandler extends ApiControllerHandler
{
    /**
     * @param Categories $obController
     * @param Category   $obModel
     * @param array      $arData
     *
     * @return void
     */
    public function beforeSave(Categories $obController, Category $obModel, array &$arData): void
    {
        if (array_get($arData, 'slug') || (!$sName = array_get($arData, 'name'))) {
            return;
        }

        array_set($arData, 'slug', str_slug($sName));
    }

    /**
     * @return string
     */
    protected function getControllerClass(): string
    {
        return Categories::class;
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }
}
