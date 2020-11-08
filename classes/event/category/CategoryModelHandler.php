<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Event\Category;

use Lovata\GoodNews\Classes\Collection\CategoryCollection;
use Lovata\GoodNews\Classes\Item\CategoryItem;
use Lovata\GoodNews\Models\Category;
use Lovata\Toolbox\Classes\Event\ModelHandler;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategoryListStore;

/**
 * Class CategoryModelHandler
 *
 * @package PlanetaDelEste\ApiGoodNews\Classes\Event\Category
 */
class CategoryModelHandler extends ModelHandler
{
    /** @var Category */
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);

        Category::extend(
            function ($obModel) {
                $this->extendModel($obModel);
            }
        );

        CategoryCollection::extend(
            function ($obCollection) {
                $this->extendCollection($obCollection);
            }
        );
    }

    /**
     * @param \Lovata\Shopaholic\Models\Category $obModel
     */
    protected function extendModel($obModel)
    {
        $obModel->addCachedField(['active']);
    }


    /**
     * @param CategoryCollection $obCollection
     */
    protected function extendCollection($obCollection)
    {
        $obCollection->addDynamicMethod(
            'sort',
            function ($sSort = BlogCategoryListStore::SORT_NO) use ($obCollection): CategoryCollection {
                $arResultIDList = BlogCategoryListStore::instance()->sorting->get($sSort);
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
        return Category::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass()
    {
        return CategoryItem::class;
    }
}
