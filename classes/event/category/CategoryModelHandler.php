<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Event\Category;

use Lovata\GoodNews\Classes\Collection\CategoryCollection;
use Lovata\GoodNews\Classes\Item\CategoryItem;
use Lovata\GoodNews\Models\Category;
use Lovata\Toolbox\Classes\Event\ModelHandler;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategoryListStore;

/**
 * Class CategoryModelHandler
 */
class CategoryModelHandler extends ModelHandler
{
    /**
     * @var Category
     */
    protected $obElement;

    /**
     * @param mixed $obEvent
     *
     * @return void
     */
    public function subscribe($obEvent): void
    {
        parent::subscribe($obEvent);

        Category::extend(
            function ($obModel): void {
                $this->extendModel($obModel);
            }
        );

        CategoryCollection::extend(
            function ($obCollection): void {
                $this->extendCollection($obCollection);
            }
        );
    }

    /**
     * @param Category $obModel
     */
    protected function extendModel(Category $obModel): void
    {
        $obModel->addCachedField(['active']);
    }

    /**
     * @param CategoryCollection $obCollection
     */
    protected function extendCollection(CategoryCollection $obCollection): void
    {
        $obCollection->addDynamicMethod(
            'sort',
            static function ($sSort = BlogCategoryListStore::SORT_NO) use ($obCollection): CategoryCollection {
                $arResultIDList = BlogCategoryListStore::instance()->sorting->get($sSort);

                return $obCollection->applySorting($arResultIDList);
            }
        );
    }

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass(): string
    {
        return CategoryItem::class;
    }
}
