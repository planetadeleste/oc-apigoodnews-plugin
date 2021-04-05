<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\ApiGoodNews\Classes\Store\Article\ListBySlugStore;

/**
 * Class ArticleListStore
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Store
 *
 * @property ListBySlugStore $slug
 */
class ArticleListStore extends AbstractListStore
{
    protected static $instance;

    protected function init()
    {
        $this->addToStoreList('slug', ListBySlugStore::class);
    }
}
