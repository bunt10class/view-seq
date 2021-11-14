<?php

declare(strict_types=1);

namespace Tests\Unit\ViewSeq\Helpers;

use Tests\TestCase;
use ViewSeq\Helpers\ArtItemHelper;

class ArtItemHelperTest extends TestCase
{
    /**
     * @group unit
     * @group view_seq
     * @group art_item_helper
     */
    public function testGetAllTypesGiveArrayOfStrings(): void
    {
        $result = ArtItemHelper::getAllTypes();

        foreach ($result as $value) {
            self::assertIsString($value);
        }
    }

    /**
     * @group unit
     * @group view_seq
     * @group art_item_helper
     */
    public function testGetAllResourcesGiveArrayOfStrings(): void
    {
        $result = ArtItemHelper::getAllResources();

        foreach ($result as $value) {
            self::assertIsString($value);
        }
    }

    /**
     * @group unit
     * @group view_seq
     * @group art_item_helper
     */
    public function testGetTypeResourcesGiveArrayOfStrings(): void
    {
        $type = array_rand(config('art_item_types'));

        $result = ArtItemHelper::getTypeResources($type);

        foreach ($result as $value) {
            self::assertIsString($value);
        }
    }

    /**
     * @group unit
     * @group view_seq
     * @group art_item_helper
     */
    public function testGetTypeResourcesHasWikipediaResource(): void
    {
        $type = array_rand(config('art_item_types'));

        $result = ArtItemHelper::getTypeResources($type);

        self::assertTrue(in_array(ArtItemHelper::RESOURCE_WIKIPEDIA, $result));
    }
}
