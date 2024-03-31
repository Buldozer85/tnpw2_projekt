<?php

namespace App\Models;

use App\Enums\Role;
use App\Enums\ShowType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

/**
 * @property integer $id
 * @property ShowType $type
 * @property string $name
 * @property Carbon $date_of_premiere
 * @property string $description
 * @property string $icon
 */
class Show extends Model
{
    use SoftDeletes, HasTrixRichText;

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
            'type' => ShowType::class
        ];
    }

    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }

    public function getMeta(string $key): ?string {
        $params = json_decode($this->parameters, true);

        if(!array_key_exists($key, $params)) {
            return null;
        }

        return $params[$key];
    }

    public function getTrixRichText(string $field)
    {
        return $this->trixRichText()->where('field', $field)->first()?->content;
    }
}
