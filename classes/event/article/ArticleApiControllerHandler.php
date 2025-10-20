<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Event\Article;

use Lovata\GoodNews\Models\Article;
use PlanetaDelEste\ApiGoodNews\Controllers\Api\Articles;
use PlanetaDelEste\ApiToolbox\Classes\Event\ApiControllerHandler;

class ArticleApiControllerHandler extends ApiControllerHandler
{
    /**
     * @param Articles $obController
     * @param Article  $obModel
     * @param array    $arData
     *
     * @return void
     */
    public function beforeSave(Articles $obController, Article $obModel, array &$arData): void
    {
        if (!array_get($arData, 'slug') && ($sTitle = array_get($arData, 'title'))) {
            array_set($arData, 'slug', str_slug($sTitle));
        }

        if (!array_has($arData, 'published_stop') || array_get($arData, 'published_stop')) {
            return;
        }

        array_forget($arData, 'published_stop');
    }

    /**
     * @return string
     */
    protected function getControllerClass(): string
    {
        return Articles::class;
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Article::class;
    }
}
