<?php

declare(strict_types=1);

namespace ViewSeq\Http\Requests\Universe;

use Shared\Dto\SearchPaginationDto;
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
                'search.search' => 'nullable|string|max:255',
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
                'search.search' => trans('universe.form.search'),
            ],
        );
    }

    public function getSearchPaginationDto(): SearchPaginationDto
    {
        return new SearchPaginationDto(
            $this->input('search'),
            $this->getPage(),
            $this->getPerPage(),
        );
    }
}
