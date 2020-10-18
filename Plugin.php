<?php namespace PlanetaDelEste\ApiGoodNews;

use Event;
use PlanetaDelEste\ApiGoodNews\Classes\Event\ApiShopaholicHandle;
use PlanetaDelEste\ApiGoodNews\Classes\Event\Category\CategoryModelHandler;
use System\Classes\PluginBase;

/**
 * Class Plugin
 * @package PlanetaDelEste\ApiGoodNews
 */
class Plugin extends PluginBase
{
    public function boot()
    {
        Event::subscribe(ApiShopaholicHandle::class);
        Event::subscribe(CategoryModelHandler::class);
    }
}
