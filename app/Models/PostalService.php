<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalService extends Model
{
    use HasFactory;

    protected $table = 'postal_service';

    protected $fillable = [

        'zip_code',
        'locality',
        
    ];

    public function federal_entity()
    {
        return $this->hasMany(FederalEntity::class,'postal_service_id','id');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class,'postal_service_id','id');
    }

    public function municipality()
    {
        return $this->hasMany(municipality::class,'postal_service_id','id');
    }

}



