<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * Table name
     */
    protected $table = 'services';

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'service_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'service_name',
        'description',
        'price',
        'duration',
        'nurse_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Service dimiliki oleh satu perawat
    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nurse_id', 'nurse_id');
    }

    // Service bisa digunakan di banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'service_id', 'service_id');
    }
}
