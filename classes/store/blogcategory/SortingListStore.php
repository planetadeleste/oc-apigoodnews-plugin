<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategory;

use Lovata\GoodNews\Models\Category;
use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiGoodNews\Classes\Store\BlogCategoryListStore;

class SortingListStore extends AbstractStoreWithParam
{
    protected static $instance;

    /**
     * Get ID list from database
     * @return array
     */
    protected function getIDListFromDB() : array
    {
        switch ($this->sValue) {
            case BlogCategoryListStore::SORT_CREATED_AT_ASC:
                $arElementIDList = $this->getByPublishASC();
                break;
            case BlogCategoryListStore::SORT_CREATED_AT_DESC:
                $arElementIDList = $this->getByPublishDESC();
                break;
            case BlogCategoryListStore::SORT_NO:
            default:
                $arElementIDList = $this->getDefaultList();
                break;
        }

        return $arElementIDList;
    }

    /**
     * Get default list
     * @return array
     */
    protected function getDefaultList() : array
    {
        return Category::lists('id');
    }

    /**
     * Get sorting ID list by published (ASC)
     * @return array
     */
    protected function getByPublishASC() : array
    {
        return Category::orderBy('created_at', 'asc')->lists('id');
    }

    /**
     * Get sorting ID list by published (DESC)
     * @return array
     */
    protected function getByPublishDESC() : array
    {
        return Category::orderBy('created_at', 'desc')->lists('id');
    }
}
