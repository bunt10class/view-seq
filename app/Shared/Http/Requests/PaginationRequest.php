<?php

declare(strict_types=1);

namespace Shared\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Shared\ValueObjects\Paginator;

class PaginationRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'pagination.page' => 'nullable|int|min:1',
            'pagination.per_page' => 'nullable|int|min:1',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'pagination.page' => trans('shared.pagination.page'),
            'pagination.per_page' => trans('shared.pagination.per_page'),
        ];
    }

    public function getPage(): ?int
    {
        return $this->input('pagination.page');
    }

    public function getPerPage(): ?int
    {
        return $this->input('pagination.per_page');
    }
}
