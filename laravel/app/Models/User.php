<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS (OPSIONAL)
    |--------------------------------------------------------------------------
    */

    // Jika nanti logs pakai user_id
    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id', 'user_id');
    }
}
