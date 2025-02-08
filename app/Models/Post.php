<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'user_id',
        'title',
        'content',
        'category_id',
        'status',
    ];
    
    public function id(): int
    {
        return $this->id;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest'
        ]);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
