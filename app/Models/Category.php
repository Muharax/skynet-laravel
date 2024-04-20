<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image'];

    public function getImageUrlAttribute()
    {
        // Zwróć URL do zdjęcia kategorii
        return $this->image ? asset('category_images/' . $this->image) : null;
    }

    // public function announcements()
    // {
    //     return $this->hasMany(Announcement::class);
    // }
}
