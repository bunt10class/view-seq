<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

use ViewSeq\Helpers\ArtItemHelper;
use ViewSeq\ValueObjects\ArtItem\UniverseItemArtItem;

class UniverseItemStoreRequest extends UniverseItemUpdateRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        $availableArtItemTypes = implode(',', ArtItemHelper::getAllTypes());
        return array_merge(
            [
                'attributes.art_item_type' => 'required|string|max:255|in:' . $availableArtItemTypes,
            ],
            parent::rules(),
        );
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return array_merge(
            [
                'attributes.art_item_type' => trans('universe.fields.art_item_type'),
            ],
            parent::rules(),
        );
    }

    public function getUniverseItemArtItem(): UniverseItemArtItem
    {
        return UniverseItemArtItem::make(
            $this->input('attributes.name'),
            $this->input('attributes.art_item_type'),
            $this->input('attributes.year'),
            $this->input('attributes.genre'),
            $this->input('attributes.description'),
            $this->input('attributes.released_at'),
            (array)$this->input('attributes.participants'),
            (array)$this->input('attributes.links'),
        );
    }
}
