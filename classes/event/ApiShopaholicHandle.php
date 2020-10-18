<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Event;

use Lovata\GoodNews\Classes\Collection\ArticleCollection;
use Lovata\GoodNews\Classes\Collection\CategoryCollection;
use Lovata\GoodNews\Models\Article;
use Lovata\GoodNews\Models\Category;
use October\Rain\Events\Dispatcher;
use PlanetaDelEste\ApiToolbox\Plugin;

class ApiShopaholicHandle
{
    /**
     * @param Dispatcher $obEvent
     */
    public function subscribe(Dispatcher $obEvent)
    {
        $obEvent->listen(
            Plugin::EVENT_API_ADD_COLLECTION,
            function () {
                return $this->addCollections();
            }
        );
    }

    protected function addCollections(): array
    {
        return [
            Category::class => CategoryCollection::class,
            Article::class  => ArticleCollection::class,
        ];
    }
}
