<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategory\SortingListStore;

/**
 * Class BlogCategoryListStore
 *
 * @property SortingListStore $sorting
 */
class BlogCategoryListStore extends AbstractListStore
{
    public const string SORT_NO              = 'no';
    public const string SORT_CREATED_AT_ASC  = 'created_at|asc';
    public const string SORT_CREATED_AT_DESC = 'created_at|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init(): void
    {
        $this->addToStoreList('sorting', SortingListStore::class);
    }
}
