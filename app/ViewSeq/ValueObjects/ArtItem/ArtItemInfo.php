<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects\ArtItem;

class ArtItemInfo
{
    protected ?string $year = null;
    protected ?string $genre = null;
    protected ?string $description = null;
    protected ?string $releasedAt = null;

    public static function make(
        ?string $year,
        ?string $genre,
        ?string $description,
        ?string $releasedAt,
    ) {
        $object = new self();
        $object->setYear($year);
        $object->setGenre($genre);
        $object->setDescription($description);
        $object->setReleasedAt($releasedAt);

        return $object;
    }

    /**
     * @return string|null
     */
    public function getYear(): ?string
    {
        return $this->year;
    }

    /**
     * @param string|null $year
     */
    public function setYear(?string $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     */
    public function setGenre(?string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getReleasedAt(): ?string
    {
        return $this->releasedAt;
    }

    /**
     * @param string|null $releasedAt
     */
    public function setReleasedAt(?string $releasedAt): void
    {
        $this->releasedAt = $releasedAt;
    }
}
