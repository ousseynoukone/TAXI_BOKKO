<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    public function regions()
    {
        return $this->belongsTo(Region::class,"region_id");
    }
    public     $timestamps = false;

    
    protected $fillable = [
        'id',
        'libelle',
        'region_id',

    ];
    
}
