<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects\ArtItem;

class ArtItemParticipants
{
    protected ?string $creators = null;
    protected ?string $directors = null;
    protected ?string $producers = null;
    protected ?string $operators = null;
    protected ?string $screenwriters = null;
    protected ?string $actors = null;
    protected ?string $showrunners = null;
    protected ?string $writers = null;

    public static function make(
        ?string $creators,
        ?string $directors,
        ?string $producers,
        ?string $operators,
        ?string $screenwriters,
        ?string $actors,
        ?string $showrunners,
        ?string $writers,
    ): self {
        $object = new self();
        $object->setCreators($creators);
        $object->setDirectors($directors);
        $object->setProducers($producers);
        $object->setOperators($operators);
        $object->setScreenwriters($screenwriters);
        $object->setActors($actors);
        $object->setShowrunners($showrunners);
        $object->setWriters($writers);

        return $object;
    }

    public static function makeByCreators(string $creators): self
    {
        $object = new self();
        $object->setCreators($creators);
        return $object;
    }

    /**
     * @return string|null
     */
    public function getCreators(): ?string
    {
        return $this->creators;
    }

    /**
     * @param string|null $creators
     */
    public function setCreators(?string $creators): void
    {
        $this->creators = $creators;
    }

    /**
     * @return string|null
     */
    public function getDirectors(): ?string
    {
        return $this->directors;
    }

    /**
     * @param string|null $directors
     */
    public function setDirectors(?string $directors): void
    {
        $this->directors = $directors;
    }

    /**
     * @return string|null
     */
    public function getProducers(): ?string
    {
        return $this->producers;
    }

    /**
     * @param string|null $producers
     */
    public function setProducers(?string $producers): void
    {
        $this->producers = $producers;
    }

    /**
     * @return string|null
     */
    public function getOperators(): ?string
    {
        return $this->operators;
    }

    /**
     * @param string|null $operators
     */
    public function setOperators(?string $operators): void
    {
        $this->operators = $operators;
    }

    /**
     * @return string|null
     */
    public function getScreenwriters(): ?string
    {
        return $this->screenwriters;
    }

    /**
     * @param string|null $screenwriters
     */
    public function setScreenwriters(?string $screenwriters): void
    {
        $this->screenwriters = $screenwriters;
    }

    /**
     * @return string|null
     */
    public function getActors(): ?string
    {
        return $this->actors;
    }

    /**
     * @param string|null $actors
     */
    public function setActors(?string $actors): void
    {
        $this->actors = $actors;
    }

    /**
     * @return string|null
     */
    public function getShowrunners(): ?string
    {
        return $this->showrunners;
    }

    /**
     * @param string|null $showrunners
     */
    public function setShowrunners(?string $showrunners): void
    {
        $this->showrunners = $showrunners;
    }

    /**
     * @return string|null
     */
    public function getWriters(): ?string
    {
        return $this->writers;
    }

    /**
     * @param string|null $writers
     */
    public function setWriters(?string $writers): void
    {
        $this->writers = $writers;
    }
}
