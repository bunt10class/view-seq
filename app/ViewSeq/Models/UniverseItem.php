<?php

declare(strict_types=1);

namespace ViewSeq\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Shared\Casts\DateTimeCast;
use Shared\ValueObjects\Datetime;
use ViewSeq\Casts\UniverseItemMetaCast;
use ViewSeq\ValueObjects\UniverseItemMeta;

/**
 * @property int $universe_item_id
 * @property int $universe_id
 * @property string|null $en_name
 * @property string|null $ru_name
 * @property string $art_item_type
 * @property Datetime|null $released_at
 * @property int|null $next_item_id
 * @property UniverseItemMeta $meta
 *
 * @property Datetime|null $created_at
 * @property Datetime|null $updated_at
 *
 * @property Universe $universe
 */
class UniverseItem extends Model
{
    use HasFactory;

    /** @var string */
    protected $primaryKey = 'universe_id';

    /** @var string[] */
    protected $fillable = [
        'universe_id',
        'en_name',
        'ru_name',
        'art_item_type',
        'released_at',
        'next_item_id',
        'meta',
    ];

    /** @var array */
    protected $casts = [
        'meta' => UniverseItemMetaCast::class,
        'released_at' => DateTimeCast::class,
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
    ];

    public function universe(): HasOne
    {
        return $this->hasOne(Universe::class, 'universe_id', 'universe_id');
    }
}
