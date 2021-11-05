<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests\Universe;

use Illuminate\Foundation\Http\FormRequest;

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
            'attributes.description' => 'nullable|string|max:10000',
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
            'attributes.description' => trans('fields.description'),
        ];
    }

    public function getAttributes(): array
    {
        return [
            'en_name' => (string)$this->input('en_name'),
            'ru_name' => (string)$this->input('ru_name'),
            'description' => (string)$this->input('description'),
        ];
    }
}
