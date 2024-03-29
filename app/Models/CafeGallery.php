<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_main',
        'subimage_1',
        'subimage_2',
        'subimage_3',
        'subimage_4',
    ];

    public function cafe(){
        return $this->belongsTo(Cafe::class);
    }
}
