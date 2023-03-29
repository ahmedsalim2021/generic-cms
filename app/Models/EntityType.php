<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    use HasFactory;

    public function entityAttributes()
    {
        return $this->hasMany(Attribute::class,'entity_type_id','id');
    }
}
