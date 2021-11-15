<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ViewSeq\ValueObjects\ArtItem\UniverseItemArtItem;

class UniverseItemUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'attributes.name' => 'required|string|max:255',
            'attributes.year' => 'nullable|string|max:255',
            'attributes.genre' => 'nullable|string|max:255',
            'attributes.description' => 'nullable|string|max:10000',
            'attributes.released_at' => 'nullable|string|date',
            'attributes.participants' => 'nullable|array',
            'attributes.participants.*' => 'nullable|string|max:255',
            'attributes.links' => 'nullable|array',
            'attributes.links.*' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'attributes.name' => trans('universe.fields.name'),
            'attributes.year' => trans('universe.fields.year'),
            'attributes.genre' => trans('universe.fields.genre'),
            'attributes.description' => trans('universe.fields.description'),
            'attributes.released_at' => trans('universe.fields.released_at'),
            'attributes.participants' => trans('universe.fields.participants'),
            'attributes.participants.*' => trans('universe.fields.participants_item'),
            'attributes.links' => trans('universe.fields.links'),
            'attributes.link.*' => trans('universe.fields.link'),
        ];
    }

    public function getUniverseItemArtItem(): UniverseItemArtItem
    {
        return UniverseItemArtItem::make(
            $this->input('attributes.name'),
            null,
            $this->input('attributes.year'),
            $this->input('attributes.genre'),
            $this->input('attributes.description'),
            $this->input('attributes.released_at'),
            (array)$this->input('attributes.participants'),
            (array)$this->input('attributes.links'),
        );
    }
}
