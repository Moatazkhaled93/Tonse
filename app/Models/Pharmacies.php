<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\UsesUuid;


class Pharmacies extends Model
{
    use HasFactory,UsesUuid,SoftDeletes;

    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'map_location',
        'address',
        'delivery',
        'logo',
        'contact_information',
        'confirmation'
    ];

    public function image() {

        return $this->hasMany(Images::class);
    }
}
