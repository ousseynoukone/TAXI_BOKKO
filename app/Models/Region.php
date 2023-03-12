<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'libelle',
      'department_id',
  ];

      public function departments()
    {
        return $this->hasMany(Department::class,"department_id");
    }

  }
