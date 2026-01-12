<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    /**
     * Table name
     */
    protected $table = 'nurses';

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'nurse_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'specialization',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Perawat memiliki banyak layanan
    public function service()
    {
        return $this->hasMany(Service::class, 'nurse_id', 'nurse_id');
    }
}
