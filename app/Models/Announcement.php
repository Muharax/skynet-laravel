<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    // public function promotedAnnouncements()
    // {
    //     return $this->where('promoted', '>', 0)
    //                 ->orderBy('promoted', 'desc')
    //                 ->get();
    // }

    public static function promotedAnnouncements()
    {
        return static::where('promoted', '>', 0)
                    ->orderBy('promoted', 'desc')
                    ->get();
    }

    public function getAllAnnouncements()
    {
        return $this->all();
    }

    // public static function promotedAnnouncements()
    // {
    //     return static::where('promoted', '>', 0)
    //                 ->orderBy('promoted', 'desc')
    //                 ->get();
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}