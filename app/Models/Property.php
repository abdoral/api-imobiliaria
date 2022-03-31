<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $guarded = ['id', 'property_owners_id'];

    public function owners() {
        return $this->belongsToMany(PropertyOwner::class, 'owners_property');
    }

}
