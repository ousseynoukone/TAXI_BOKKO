<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajets extends Model
{
    use HasFactory;

    public     $timestamps = false;

    
    protected $fillable = [
      'departement_D_id',
      'departement_A_id',
      'region_A_id',
      'region_D_id',
      'chauffeur_id',
      'client_id',
      'distance',
      'tarif',
      'start',
      'started',
      'endnotif',
  ];



    public function departement_D()
    {
        return $this->belongsTo(Departement::class, 'departement_D_id');
    }

    public function departement_A()
    {
        return $this->belongsTo(Departement::class, 'departement_A_id');
    }

    public function region_D()
    {
        return $this->belongsTo(Region::class, 'region_D_id');
    }

    public function region_A()
    {
        return $this->belongsTo(Region::class, 'region_A_id');
    }

    public function clients()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function chauffeurs()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }
    


}
