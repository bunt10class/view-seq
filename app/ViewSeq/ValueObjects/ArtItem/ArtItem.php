<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects\ArtItem;

use Exception;
use ViewSeq\Helpers\ArtItemHelper;

class ArtItem
{
    protected string $name;
    protected ?string $type;
    protected ArtItemInfo $info;
    protected array $participants;
    protected array $links;

    public function __construct(
        string $name,
        ?string $type,
        ArtItemInfo $info,
        array $participants = [],
        array $links = [],
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->participants = $participants;
        $this->info = $info;
        $this->links = $links;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $type
     * @throws Exception
     */
    public function setType(?string $type): void
    {
        if (!in_array($type, ArtItemHelper::getAllTypes())) {
            throw new Exception('Invalid art item type', 400);
        }
        $this->type = $type;
    }

    public function getInfo(): ArtItemInfo
    {
        return $this->info;
    }

    public function setInfo(ArtItemInfo $info): void
    {
        $this->info = $info;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function setParticipants(array $participants): void
    {
        $this->participants = $participants;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function setLinks(array $links): void
    {
        $this->links = $links;
    }

    public function toArrayForElasticSearch(): array
    {
        return [
            'name' => $this->getName(),
            'art_item_type' => $this->getType(),
            'year' => $this->getInfo()->getYear(),
            'genre' => $this->getInfo()->getGenre(),
            'description' => $this->getInfo()->getDescription(),
            'participants' => $this->getParticipants(),
        ];
    }
}
