<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\ApiShopaholic\Classes\Resource\File\IndexCollection as IndexCollectionImages;
use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ItemResource
 *
 * @mixin \Lovata\GoodNews\Classes\Item\CategoryItem
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Category
 */
class ItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData()
    {
        return [
            'preview_image' => $this->preview_image ? $this->preview_image->getPath() : null,
            'images'        => IndexCollectionImages::make(collect($this->images)),
            'parent'        => $this->parent_id ? ItemResource::make($this->parent) : null
        ];
    }

    public function getDataKeys()
    {
        return [
            'id',
            'name',
            'slug',
            'code',
            'active',
            'preview_text',
            'description',
            'nest_depth',
            'parent_id',
            'preview_image',
            'images'
        ];
    }

    protected function getEvent()
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA;
    }
}
