<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ViewSeq\Dto\UniverseItemUpdateDto;

class UniverseItemUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'attributes.en_name' => 'required_without:ru_name|string|max:255',
            'attributes.ru_name' => 'required_without:en_name|string|max:255',
            'attributes.released_at' => 'nullable|string|date',
            'attributes.genre' => 'nullable|string|max:255',
            'attributes.links' => 'nullable|array',
            'attributes.links.*' => 'nullable|string|max:255',
            'attributes.info' => 'nullable|array',
            'attributes.info.*' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'attributes.universe_id' => trans('universe.fields.universe_id'),
            'attributes.en_name' => trans('universe.fields.en_name'),
            'attributes.art_item_type' => trans('universe.fields.art_item_type'),
            'attributes.released_at' => trans('universe.fields.released_at'),
            'attributes.genre' => trans('universe.fields.genre'),
            'attributes.links' => trans('universe.fields.links'),
            'attributes.link.*' => trans('universe.fields.link'),
            'attributes.info' => trans('universe.fields.info'),
            'attributes.info.*' => trans('universe.fields.info_item'),
        ];
    }

    public function getUniverseItemUpdateDto(): UniverseItemUpdateDto
    {
        return new UniverseItemUpdateDto(
            $this->input('attributes.en_name'),
            $this->input('attributes.ru_name'),
            $this->input('attributes.released_at'),
            $this->input('attributes.genre'),
            $this->input('attributes.links'),
            $this->input('attributes.info'),
        );
    }
}
