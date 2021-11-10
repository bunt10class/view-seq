<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests\Universe;

use Illuminate\Foundation\Http\FormRequest;
use ViewSeq\Dto\UniverseDto;

class UniverseStoreRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'attributes.en_name' => 'required_without:ru_name|string|max:255',
            'attributes.ru_name' => 'required_without:en_name|string|max:255',
            'attributes.creator' => 'nullable|string|max:255',
            'attributes.description' => 'nullable|string|max:10000',
            'attributes.birth_date' => 'nullable|string|max:255',
            'attributes.wiki_link' => 'nullable|string|max:1000',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'attributes.en_name' => trans('fields.en_name'),
            'attributes.ru_name' => trans('fields.ru_name'),
            'attributes.creator' => trans('fields.creator'),
            'attributes.description' => trans('fields.description'),
            'attributes.birth_date' => trans('fields.birth_date'),
            'attributes.wiki_link' => trans('fields.wiki_link'),
        ];
    }

    public function getUniverseDto(): UniverseDto
    {
        return new UniverseDto(
            $this->input('attributes.en_name'),
            $this->input('attributes.ru_name'),
            $this->input('attributes.creator'),
            $this->input('attributes.description'),
            $this->input('attributes.birth_date'),
            $this->input('attributes.wiki_link'),
        );
    }
}
