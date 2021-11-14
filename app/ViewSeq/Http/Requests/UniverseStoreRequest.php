<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests;

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
            'attributes.birth_date' => 'nullable|string|date',
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
            'attributes.en_name' => trans('universe.fields.en_name'),
            'attributes.ru_name' => trans('universe.fields.ru_name'),
            'attributes.creator' => trans('universe.fields.creator'),
            'attributes.description' => trans('universe.fields.description'),
            'attributes.birth_date' => trans('universe.fields.birth_date'),
            'attributes.links' => trans('universe.fields.links'),
            'attributes.links.*' => trans('universe.fields.link'),
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
            $this->input('attributes.links'),
        );
    }
}
