<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Table name
     */
    protected $table = 'transactions';

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'transaction_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'patient_id',
        'service_id',
        'reservation_date',
        'payment_method',
        'status',
        'notes',
        'paid_at',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'reservation_date' => 'date',
        'paid_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Transaksi milik satu pasien
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    // Transaksi untuk satu layanan
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }
}
