<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;

class Project extends Model 
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'videoUrl',
        'client',
        'agency',
        'ph',
        'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category that owns the project.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the crews for the project.
     */
    public function crews()
    {
        return $this->belongsToMany(Crew::class, 'project_crew')->withPivot('role', 'id');
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
