<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * Table name
     */
    protected $table = 'patients';

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'patient_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'nik',
        'phone',
        'address',
        'birth_date',
        'gender',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Pasien memiliki banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'patient_id', 'patient_id');
    }
}
