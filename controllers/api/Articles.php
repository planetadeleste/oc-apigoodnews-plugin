<?php

namespace PlanetaDelEste\ApiGoodNews\Controllers\Api;

use Lovata\GoodNews\Classes\Store\ArticleListStore;
use Lovata\GoodNews\Models\Article;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;

/**
 * Class Articles
 */
class Articles extends Base
{
    public $sortColumn = ArticleListStore::SORT_PUBLISH_DESC;

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->isBackend() ? 'id' : 'slug';
    }

    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return Article::class;
    }
}
