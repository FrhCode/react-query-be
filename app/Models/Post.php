<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAuthorCategoryNameAttribute()
    {
        return $this->author . '' . $this->category->name;
    }

    public function getActiveDaysAttribute()
    {
        return $this->created_at->diff($this->updated_at)->days;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function scopeNewest($query)
    {
        return $query->where('created_at', '>', Carbon::now()->subDays(7));
    }
}
