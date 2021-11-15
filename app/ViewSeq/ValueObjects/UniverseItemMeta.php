<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects;

use ViewSeq\ValueObjects\ArtItem\ArtItemInfo;

class UniverseItemMeta
{
    protected ArtItemInfo $info;
    protected array $participants;
    protected array $links;

    public function __construct(ArtItemInfo $info, array $participants, array $links)
    {
        $this->info = $info;
        $this->participants = $participants;
        $this->links = $links;
    }

    public function getInfo(): ArtItemInfo
    {
        return $this->info;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getLinks(): array
    {
        return $this->links;
    }
}
