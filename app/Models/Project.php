<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'content',
        'image',
        'location',
        'sector',
        'technology',
        'scope_of_work',
        'completion_date',
        'is_active',
        'order',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'completion_date' => 'date'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
