<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Store\Article;

use Lovata\GoodNews\Models\Article;
use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;

class ListBySlugStore extends AbstractStoreWithParam
{
    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return Article::getBySlug($this->sValue)->lists('id');
    }
}
