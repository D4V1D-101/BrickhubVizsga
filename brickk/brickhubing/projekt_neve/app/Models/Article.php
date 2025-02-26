<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'author', 'content', 'status', 'game_id'];
    public function game()
    {
        return $this->belongsTo(Games::class, 'game_id'); 
    }
}
