<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ShowResource
 *
 * @mixin \Lovata\GoodNews\Classes\Item\ArticleItem
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Article
 */
class ShowResource extends ItemResource
{
    public function getDataKeys(): array
    {
        return [
            'id',
            'category_id',
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

    protected function getEvent(): string
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}

