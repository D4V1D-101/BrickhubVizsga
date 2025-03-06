<?php

// App\Models\Genres.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
