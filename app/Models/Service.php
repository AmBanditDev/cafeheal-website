<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cafeServices(){
        return $this->hasMany(CafeService::class);
    }

    public function cafes()
    {
        return $this->belongsToMany(Cafe::class, 'cafe_services')->withPivot('service_status');
    }
}
