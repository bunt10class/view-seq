<?php

declare(strict_types=1);

namespace Shared\Dto;

class PaginationDto
{
    protected ?int $page;
    protected ?int $perPage;

    public function __construct(?int $page, ?int $perPage)
    {
        $this->page = $page;
        $this->perPage = $perPage;
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
