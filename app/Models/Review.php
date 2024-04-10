<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    protected $fillable = [
        'content',
        'rating',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }
}
