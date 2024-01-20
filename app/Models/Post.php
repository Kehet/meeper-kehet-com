<?php

namespace App\Models;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia, TaggableInterface
{
    use InteractsWithMedia;
    use TaggableTrait;
    use HasSlug;
    use HasFactory;
    use Searchable;

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
        if (! isset($this->body) || $this->isDirty()) {
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

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'body' => $this->body,
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        self::updated(function ($model) {
            Cache::forget('message|' . $model->id);
        });
    }
}
