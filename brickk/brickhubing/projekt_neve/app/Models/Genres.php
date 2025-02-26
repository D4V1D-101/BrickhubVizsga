<?php

// App\Models\Genres.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'status'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}