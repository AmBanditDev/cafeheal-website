<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_status',
    ];
    
    public function cafe(){
        return $this->belongsTo(Cafe::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
