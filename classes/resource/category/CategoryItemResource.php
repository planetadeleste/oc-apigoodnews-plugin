<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

use Lovata\GoodNews\Classes\Item\CategoryItem;
use PlanetaDelEste\ApiShopaholic\Classes\Resource\File\IndexCollection as IndexCollectionImages;
use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class CategoryItemResource
 *
 * @mixin CategoryItem
 */
class CategoryItemResource extends Base
{
    /**
     * @return array{images: IndexCollectionImages, parent: Base|CategoryItemResource|null, preview_image: mixed}
     */
    public function getData(): array
    {
        return [
            'preview_image' => $this->preview_image ? $this->preview_image->getPath() : null,
            'images'        => IndexCollectionImages::make(collect($this->images)),
            'parent'        => $this->parent_id ? CategoryItemResource::make($this->parent) : null,
            'children'      => CategoryListCollection::make($this->children->collect())
        ];
    }

    /**
     * @return array<string>
     */
    public function getDataKeys(): array
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
            'images',
            'children',
            'parent'
        ];
    }

    /**
     * @return string
     */
    protected function getEvent(): ?string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA;
    }
}
