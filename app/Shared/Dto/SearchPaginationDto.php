<?php

declare(strict_types=1);

namespace Shared\Dto;

class SearchPaginationDto
{
    protected ?string $search;
    protected ?int $page;
    protected ?int $perPage;

    public function __construct(?string $search, ?int $page, ?int $perPage)
    {
        $this->search = $search;
        $this->page = $page;
        $this->perPage = $perPage;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getPerPage(): ?int
    {
        return $this->perPage;
    }
}
