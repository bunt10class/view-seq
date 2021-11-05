<?php

declare(strict_types=1);

namespace ViewSeq\Models;

use Shared\Casts\DateTimeCast;
use Shared\ValueObjects\Datetime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $universe_id
 * @property string|null $en_name
 * @property string|null $ru_name
 * @property string|null $description
 *
 * @property Datetime|null $created_at
 * @property Datetime|null $updated_at
 * @property Datetime|null $deleted_at
 */
class Universe extends Model
{
    use HasFactory;

    /** @var string */
    protected $primaryKey = 'universe_id';

    /** @var string[] */
    protected $fillable = [
        'en_name',
        'ru_name',
        'description',
    ];

    /** @var array */
    protected $casts = [
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
        'deleted_at' => DateTimeCast::class,
    ];
}
