<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser ;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_USER => 'User ',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

        public function getRememberToken()
    {
        $token = $this->tokens()
            ->where('expiry_date', '>', now())
            ->orderBy('expiry_date', 'desc')
            ->value('token');

        return $token;
    }

    public function setRememberToken($value)
    {
        $existingToken = $this->tokens()
            ->where('device', 0) // Vagy a megfelelő device érték
            ->where('expiry_date', '>', now())
            ->first();

        if ($existingToken) {
            $existingToken->update([
                'token' => $value,
                'expiry_date' => now()->addDays(7) // Beállíthatod a megfelelő lejárati időt
            ]);
        } else {
            $this->tokens()->create([
                'device' => 0, // Állítsd be a megfelelő értéket
                'token' => $value,
                'expiry_date' => now()->addDays(7) // Beállíthatod a megfelelő lejárati időt
            ]);
        }
    }

    public function getRememberTokenName()
    {
        return 'token';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->can('view-admin', User::class);
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
