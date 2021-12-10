<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'tags',
    ];

    protected $appends = [
        'html',
    ];

    protected $casts = [
        'tags' => 'collection',
    ];

    public function getHtmlAttribute(): string
    {
        return Cache::rememberForever('message|' . $this->id, function () {
            return Str::markdown($this->body);
        });
    }

    public function setTagsAttribute($value)
    {
        if(is_string($value)) {
            $this->attributes['tags'] = collect(explode(',', $value));
            return;
        }

        $this->attributes['tags'] = $value;
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
            'tags' => $this->tags->toArray(),
        ];
    }
}
