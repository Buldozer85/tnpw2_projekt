<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $content
 * @property integer $id
 * @property string $rating
 * @property integer $user_id
 * @property integer $show_id
 */
class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'rating',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function show(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Show::class);
    }
}
