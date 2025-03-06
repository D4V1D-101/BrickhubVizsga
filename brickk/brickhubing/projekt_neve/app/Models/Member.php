<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name','designation','git_url','linkedin_url','status','image'];
    public function getImageAttribute($value)
    {
        return $value ?? 'https://i.postimg.cc/HsZDgXD8/NoImage.webp';
    }
}
