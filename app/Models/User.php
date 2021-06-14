<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens,
        Notifiable,
        SoftDeletes;

    public $incrementing = false; // YOLO
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getHasPasswordAttribute() {
        
        return !empty($this->password) ? true : false;
    }

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function user() {
        return $this->belongsToMany(user::class,'user_user','from','to')->whereNull('user_user.deleted_at');
    }
    public function message() {
        return $this->belongsToMany(user::class,'messages','from','to')->whereNull('messages.deleted_at')->withPivot('text');
    }

}
