<?php

namespace PlanetaDelEste\ApiGoodNews;

use Event;
use PlanetaDelEste\ApiGoodNews\Classes\Event\ApiShopaholicHandle;
use PlanetaDelEste\ApiGoodNews\Classes\Event\Article\ArticleApiControllerHandler;
use PlanetaDelEste\ApiGoodNews\Classes\Event\Article\ArticleModelHandler;
use PlanetaDelEste\ApiGoodNews\Classes\Event\Category\CategoryApiControllerHandler;
use PlanetaDelEste\ApiGoodNews\Classes\Event\Category\CategoryModelHandler;
use System\Classes\PluginBase;

/**
 * Class Plugin
 */
class Plugin extends PluginBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $arEvents = [
            ApiShopaholicHandle::class,
            CategoryModelHandler::class,
            CategoryApiControllerHandler::class,
            ArticleModelHandler::class,
            ArticleApiControllerHandler::class,
        ];

        array_walk($arEvents, [Event::class, 'subscribe']);
    }
}
