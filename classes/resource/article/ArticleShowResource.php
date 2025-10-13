<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use Lovata\GoodNews\Classes\Item\ArticleItem;
use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ArticleShowResource
 *
 * @mixin ArticleItem
 */
class ArticleShowResource extends ArticleItemResource
{
    /**
     * @return array<string>
     */
    public function getDataKeys(): array
    {
        return [
            'id',
            'category_id',
            'status_id',
            'category',
            'title',
            'slug',
            'preview_text',
            'content',
            'published_start',
            'published_stop',
            'view_count',
            'preview_image',
            'images'
        ];
    }

    /**
     * @return string
     */
    protected function getEvent(): string
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}
