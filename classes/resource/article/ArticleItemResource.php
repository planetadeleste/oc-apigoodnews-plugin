<?php

namespace PlanetaDelEste\ApiGoodNews\Classes\Resource\Article;

use Lovata\GoodNews\Classes\Item\ArticleItem;
use PlanetaDelEste\ApiGoodNews\Classes\Resource\Category\CategoryItemResource;
use PlanetaDelEste\ApiShopaholic\Classes\Resource\File\IndexCollection as IndexCollectionImages;
use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ItemResource
 *
 * @mixin ArticleItem
 */
class ArticleItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData(): array
    {
        return [
            'preview_image'          => $this->preview_image ? $this->preview_image->getPath() : null,
            'images'                 => IndexCollectionImages::make(collect($this->images)),
            'category'               => $this->category_id ? CategoryItemResource::make($this->category) : null,
            'published_start'        => $this->published_start ? $this->published_start->toDateTimeString() : null,
            'published_start_object' => $this->published_start,
            'published_stop'         => $this->published_stop ? $this->published_stop->toDateTimeString() : null,
            'published_stop_object'  => $this->published_stop,
        ];
    }

    /**
     * @return array<string>
     */
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

    /**
     * @return string
     */
    protected function getEvent(): ?string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA;
    }
}
