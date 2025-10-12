<?php namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\ApiShopaholic\Classes\Resource\File\IndexCollection as IndexCollectionImages;
use PlanetaDelEste\ApiToolbox\Plugin;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Category\ItemResource as ItemResourceCategory;

/**
 * Class ItemResource
 *
 * @mixin \Lovata\GoodNews\Classes\Item\ArticleItem
 * @package PlanetaDelEste\ApiGoodNews\Classes\Resource\Article
 */
class ItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData(): array
    {
        return [
            'preview_image'          => $this->preview_image ? $this->preview_image->getPath() : null,
            'images'                 => IndexCollectionImages::make(collect($this->images)),
            'category'               => $this->category_id ? ItemResourceCategory::make($this->category) : null,
            'published_start'        => $this->published_start ? $this->published_start->toDateTimeString() : null,
            'published_start_object' => $this->published_start,
            'published_stop'         => $this->published_stop ? $this->published_stop->toDateTimeString() : null,
            'published_stop_object'  => $this->published_stop,
        ];
    }

    public function getDataKeys(): array
    {
        return [
            'id',
            'category_id',
            'status_id',
            'title',
            'slug',
            'preview_text',
            'category',
            'preview_image',
        ];
    }

    protected function getEvent(): ?string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA;
    }
}
