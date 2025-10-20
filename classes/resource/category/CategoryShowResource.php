<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Category;

use Lovata\GoodNews\Classes\Item\CategoryItem;
use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class CategoryShowResource
 *
 * @mixin CategoryItem
 */
class CategoryShowResource extends CategoryItemResource
{
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
            'parent',
            'children',
            'preview_image',
            'images'
        ];
    }

    /**
     * @return string
     */
    protected function getEvent(): ?string
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}
