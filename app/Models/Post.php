<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Post extends Model
{
    use HasKey;
    use HasSlug;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'key',
      'title',
      'slug',
      'body',
      'description',
      'published',
      'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }
}
