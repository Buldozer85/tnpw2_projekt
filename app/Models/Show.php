<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property Carbon $date_of_premiere
 * @property string $description
 * @property string $icon
 */
class Show extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'name',
        'date_of_premiere',
        'description',
        'icon'
    ];

    protected function casts(): array
    {
        return [
            'date_of_premiere' => 'datetime',
        ];
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }
}
