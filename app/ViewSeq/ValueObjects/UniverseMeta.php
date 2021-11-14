<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects;

use Shared\ValueObjects\Datetime;

class UniverseMeta
{
    protected ?string $description;
    protected ?Datetime $birthDate;
    protected array $links;

    public function __construct(?string $description, ?Datetime $birthDate, array $links)
    {
        $this->description = $description;
        $this->birthDate = $birthDate;
        $this->links = $links;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBirthDate(): ?Datetime
    {
        return $this->birthDate;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function toArray(): array
    {
        return [
            'description' => $this->getDescription(),
            'birth_date' => $this->getBirthDate(),
            'links' => $this->getLinks(),
        ];
    }
}
