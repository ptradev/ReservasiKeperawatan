<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    /**
     * Table name
     */
    protected $table = 'logs';

    /**
     * Primary key configuration
     */
    protected $primaryKey = 'log_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'user_id',
        'log_method',
        'log_url',
        'log_ip',
        'log_request',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
