<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Event\Article;

use Lovata\GoodNews\Classes\Collection\ArticleCollection;
use Lovata\GoodNews\Classes\Item\ArticleItem;
use Lovata\Toolbox\Classes\Event\ModelHandler;
use Lovata\GoodNews\Models\Article;
use PlanetaDelEste\ApiGoodNews\Classes\Store\ArticleListStore;

/**
 * Class ArticleModelHandler
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Event\Article
 */
class ArticleModelHandler extends ModelHandler
{
    /** @var Article */
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);

        ArticleCollection::extend(
            function ($obCollection) {
                $this->extendCollection($obCollection);
            }
        );
    }

    protected function extendCollection(ArticleCollection $obCollection)
    {
        $obCollection->addDynamicMethod(
            'slug',
            function (string $sValue) use ($obCollection) {
                $arResultIDList = ArticleListStore::instance()->slug->get($sValue);

                return $obCollection->intersect($arResultIDList);
            }
        );
    }

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass()
    {
        return Article::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass()
    {
        return ArticleItem::class;
    }

    /**
     * After create event handler
     */
    protected function afterCreate()
    {
        parent::afterCreate();
    }

    /**
     * After save event handler
     */
    protected function afterSave()
    {
        parent::afterSave();
    }

    /**
     * After delete event handler
     */
    protected function afterDelete()
    {
        parent::afterDelete();
    }
}
