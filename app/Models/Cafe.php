<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_th',
        'name_en',
        'detail',
        'address',
        'street',
        'district',
        'sub_district',
        'tel',
        'website',
        'working_time',
        'map_link',
    ];

    public function cafeGallery() {
        return $this->hasOne(CafeGallery::class);
    }

    public function cafeServices(){
        return $this->hasMany(CafeService::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'cafe_services')->withPivot('service_status');
    }
}
