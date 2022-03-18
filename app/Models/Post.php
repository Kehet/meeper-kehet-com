<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Post extends Model implements HasMedia, TaggableInterface
{
    use HasFactory;
    use Searchable;
    use InteractsWithMedia;
    use TaggableTrait;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'title',
        'body',
        'url',
    ];

    protected $appends = [
        'html',
    ];

    public function getHtmlAttribute(): ?string
    {
        if(empty($this->body) || $this->isDirty()) {
            return $this->body;
        }

        return Cache::rememberForever('message|' . $this->id, function () {
            return Str::markdown($this->body);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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
            'url' => $this->url,
            'body' => $this->body,
            'tags' => $this->tags->map(function($tag) {
                return $tag->name;
            }),
            'category' => $this->category->name,
        ];
    }
}
