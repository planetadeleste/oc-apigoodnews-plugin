<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategory\SortingListStore;

/**
 * Class BlogCategoryListStore
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Store
 * @property SortingListStore $sorting
 */
class BlogCategoryListStore extends AbstractListStore
{
    const SORT_NO = 'no';
    const SORT_CREATED_AT_ASC = 'created_at|asc';
    const SORT_CREATED_AT_DESC = 'created_at|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
    }
}
