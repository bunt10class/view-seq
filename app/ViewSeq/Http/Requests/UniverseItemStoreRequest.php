<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

use ViewSeq\Dto\UniverseItemStoreDto;
use ViewSeq\Helpers\ArtItemHelper;

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

    public function getUniverseItemDto(): UniverseItemStoreDto
    {
        return new UniverseItemStoreDto(
            $this->input('attributes.en_name'),
            $this->input('attributes.ru_name'),
            $this->input('attributes.art_item_type'),
            $this->input('attributes.released_at'),
            $this->input('attributes.genre'),
            $this->input('attributes.links'),
            $this->input('attributes.info'),
        );
    }
}
