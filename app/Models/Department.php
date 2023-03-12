<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function regions()
    {
        return $this->belongsTo(Region::class,"department_id");
    }

    
    protected $fillable = [
        'id',
        'libelle',
    ];
    
}
