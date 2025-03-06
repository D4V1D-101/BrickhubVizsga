<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Token extends Model
{
    protected $fillable = [
        'device',
        'user_id',
        'token',
        'expiry_date'
    ];

    protected $casts = [
        'device' => 'boolean',
        'expiry_date' => 'datetime',
    ];

    public $timestamps = true;

    const UPDATED_AT = null;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
