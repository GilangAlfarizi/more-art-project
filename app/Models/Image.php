<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Image extends Model
{
    use HasFactory, MediaAlly;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'public_id',
        'project_id',
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
     * Check if the total size of uploaded files exceeds the specified limit.
     *
     * @param array $files The array of uploaded files.
     * @param int $maxSize The maximum allowed size in bytes (default is 4MB).
     * @return bool True if total size exceeds limit, false otherwise.
     */
    public static function checkFileSizes(array $files, int $maxSize = 4194304) // 4MB in bytes
    {
        $totalSize = 0;

        foreach ($files as $file) {
            $totalSize += $file->getSize(); // Get size in bytes
        }

        return $totalSize > $maxSize; // Return true if total size exceeds max size
    }

    /**
     * Extract the public_id from the given URL.
     *
     * @param string $url
     * @return string
     */
    public static function extractPublicId($url)
    {
        // Extract the identifier from the URL
        $identifier = substr($url, strrpos($url, '/') + 1, strrpos($url, '.') - strrpos($url, '/') - 1);
        
        // Concatenate 'moreart/' with the identifier to form the public_id
        return 'moreart/' . $identifier;
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
