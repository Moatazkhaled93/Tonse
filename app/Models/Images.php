<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\UsesUuid;

class Images extends Model
{
    use HasFactory,UsesUuid,SoftDeletes;
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'path',
        'pharmacy_id',
    ];
    public function pharmacy() {
        return $this->belongsTo(Pharmacies::class);
    }
}
