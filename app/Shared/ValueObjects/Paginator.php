<?php

declare(strict_types=1);

namespace Shared\ValueObjects;

class Paginator
{
    public const DEFAULT_PAGE = 1;
    public const DEFAULT_PER_PAGE = 20;

    private int $page;
    private int $perPage;

    public function __construct(int $page = self::DEFAULT_PAGE, int $perPage = self::DEFAULT_PER_PAGE)
    {
        $this->setPage($page);
        $this->setPerPage($perPage);
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    private function setPage(int $page): void
    {
        if ($page < 1) {
            $page = self::DEFAULT_PAGE;
        }
        $this->page = $page;
    }

    private function setPerPage(int $perPage): void
    {
        if ($perPage < 1) {
            $perPage = self::DEFAULT_PER_PAGE;
        }
        $this->perPage = $perPage;
    }
}
