<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests\Universe;

use Shared\Http\Requests\PaginationRequest;

class UniverseIndexRequest extends PaginationRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                'search.name_fragment' => 'nullable|string|max:255',
            ],
        );
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return array_merge(
            parent::attributes(),
            [
                'search.name_fragment' => trans('universe.form.name_fragment'),
            ],
        );
    }

    public function getNameFragment(): string
    {
        return $this->input('attributes.name_fragment');
    }
}
