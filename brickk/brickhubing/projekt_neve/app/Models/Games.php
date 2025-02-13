<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_desc', 'description', 'status', 'developer_id', 'publisher_id'];

    public function developer()
    {
        return $this->belongsTo(Member::class, 'developer_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Member::class, 'publisher_id');
    }
}
