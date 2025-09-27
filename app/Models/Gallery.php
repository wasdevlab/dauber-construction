<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'project_type',
        'image_path',
        'image_alt',
        'sort_order',
        'featured',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope a query to only include featured galleries.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to filter by project type.
     */
    public function scopeByProjectType($query, $projectType)
    {
        return $query->where('project_type', $projectType);
    }

    /**
     * Get the full URL for the image.
     */
    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }
}
