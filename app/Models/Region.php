<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{

  public     $timestamps = false;

    use HasFactory;
    
    protected $fillable = [
      'id',
      'libelle',
  ];

      public function departements()
    {
        return $this->hasMany(Departement::class,"region_id");
    }



  }
