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
            'pagination.page' => trans('pagination.page'),
            'pagination.per_page' => trans('pagination.per_page'),
        ];
    }

    public function getPaginator(): Paginator
    {
        return new Paginator(
            (int)$this->input('pagination.page'),
            (int)$this->input('pagination.per_page'),
        );
    }
}
