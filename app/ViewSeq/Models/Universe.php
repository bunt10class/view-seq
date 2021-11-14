<?php

declare(strict_types=1);

namespace ViewSeq\Models;

use Database\Factories\UniverseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Shared\Casts\DateTimeCast;
use Shared\ValueObjects\Datetime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ViewSeq\Casts\UniverseMetaCast;
use ViewSeq\ValueObjects\UniverseMeta;

/**
 * @property int $universe_id
 * @property string|null $en_name
 * @property string|null $ru_name
 * @property string|null $creator
 * @property UniverseMeta $meta
 *
 * @property Datetime|null $created_at
 * @property Datetime|null $updated_at
 * @property Datetime|null $deleted_at
 *
 * @property Collection $universeItems
 */
class Universe extends Model
{
    use HasFactory;
    use SoftDeletes;

    /** @var string */
    protected $primaryKey = 'universe_id';

    /** @var string[] */
    protected $fillable = [
        'en_name',
        'ru_name',
        'creator',
        'meta',
    ];

    /** @var array */
    protected $casts = [
        'meta' => UniverseMetaCast::class,
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
        'deleted_at' => DateTimeCast::class,
    ];

    public function universeItems(): HasMany
    {
        return $this->hasMany(UniverseItem::class, 'universe_id', 'universe_id');
    }

    public static function newFactory(): UniverseFactory
    {
        return new UniverseFactory();
    }
}
