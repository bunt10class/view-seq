<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ViewSeq\ValueObjects\ArtItem\UniverseArtItem;

class UniverseStoreRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'attributes.name' => 'required|string|max:255',
            'attributes.creator' => 'nullable|string|max:255',
            'attributes.year' => 'nullable|string|max:255',
            'attributes.description' => 'nullable|string|max:10000',
            'attributes.links' => 'nullable|array',
            'attributes.links.*' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'attributes.name' => trans('universe.fields.en_name'),
            'attributes.creator' => trans('universe.fields.creator'),
            'attributes.year' => trans('universe.fields.year'),
            'attributes.description' => trans('universe.fields.description'),
            'attributes.links' => trans('universe.fields.links'),
            'attributes.links.*' => trans('universe.fields.link'),
        ];
    }

    public function getUniverseArtItem(): UniverseArtItem
    {
        return new UniverseArtItem(
            $this->input('attributes.name'),
            $this->input('attributes.creator'),
            $this->input('attributes.year'),
            $this->input('attributes.description'),
            $this->input('attributes.links'),
        );
    }
}
