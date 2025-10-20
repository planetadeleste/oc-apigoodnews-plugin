<?php

namespace PlanetaDelEste\ApiGoodNews\Controllers\Api;

use Lovata\GoodNews\Classes\Store\ArticleListStore;
use Lovata\GoodNews\Models\Article;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Article\ArticleIndexCollection;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Article\ArticleListCollection;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Article\ArticleShowResource;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;

/**
 * Class Articles
 */
class Articles extends Base
{
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

    /**
     * @return string
     */
    public function getSortColumn(): ?string
    {
        return ArticleListStore::SORT_PUBLISH_DESC;
    }

    /**
     * @return string
     */
    public function getShowResource(): ?string
    {
        return ArticleShowResource::class;
    }

    /**
     * @return string
     */
    public function getIndexResource(): ?string
    {
        return ArticleIndexCollection::class;
    }

    /**
     * @return string
     */
    public function getListResource(): ?string
    {
        return ArticleListCollection::class;
    }
}
