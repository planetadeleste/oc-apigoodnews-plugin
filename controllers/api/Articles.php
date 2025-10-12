<?php namespace PlanetaDelEste\ApiGoodNews\Controllers\Api;

use Exception;
use Lovata\GoodNews\Classes\Store\ArticleListStore;
use Lovata\GoodNews\Models\Article;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;

/**
 * Class Articles
 *
 * @package PlanetaDelEste\ApiGoodNews\Controllers\Api
 */
class Articles extends Base
{
    public $sortColumn = ArticleListStore::SORT_PUBLISH_DESC;

    protected function save(): bool
    {
        if (!array_get($this->data, 'slug') && ($sTitle = array_get($this->data, 'title'))) {
            array_set($this->data, 'slug', str_slug($sTitle));
        }

        if (array_has($this->data, 'published_stop') && !array_get($this->data, 'published_stop')) {
            array_forget($this->data, 'published_stop');
        }

        return parent::save();
    }

    public function getPrimaryKey(): string
    {
        return $this->isBackend() ? 'id' : 'slug';
    }

    public function getModelClass(): string
    {
        return Article::class;
    }
}
