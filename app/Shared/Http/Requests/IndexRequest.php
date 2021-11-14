<?php

declare(strict_types=1);

namespace Shared\Http\Requests;

use Shared\Dto\SearchPaginationDto;

class IndexRequest extends PaginationRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                'search' => 'nullable|string|max:255',
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
                'search' => trans('shared.search'),
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
