<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory;
    use HasTags;
    use Searchable;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
    ];

    protected $appends = [
        'html',
    ];

    public function getHtmlAttribute(): string
    {
        return Cache::rememberForever('message|' . $this->id, function () {
            return Str::markdown($this->body);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::updated(function ($model) {
            Cache::forget('message|' . $model->id);
        });
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'tags' => $this->tags->map(function($tag) {
                return $tag->name;
            })->toArray(),
        ];
    }
}
