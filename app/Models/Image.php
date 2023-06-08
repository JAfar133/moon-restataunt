<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'path', 'img', 'src'
    ];

    public function getImgAttribute()
    {
        return $this->path;
    }

    public function getSrcAttribute()
    {
        return Storage::url($this->path);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            // Удаление файла при удалении записи
            Storage::disk('local')->delete($image->path);
        });
    }

    private static function createModelWithPathAttribute(string $path) : Model
    {
        $instance = new self();
        $instance->path = $path;
        $instance->save();
        return $instance;
    }
    public static function create(array $attributes = []) : Model
    {
        $instance = new self();

        if (is_array($attributes) && is_array($attributes['path'])) {
            foreach ($attributes['path'] as $path) {
                $instance = self::createModelWithPathAttribute($path);
            }
        } else {
            $path = $attributes['path'];
            $instance = self::createModelWithPathAttribute($path);
        }

        return $instance;
    }
}

