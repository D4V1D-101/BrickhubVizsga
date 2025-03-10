<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';

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

    protected $rememberTokenName = 'token';

    // Tokenok kapcsolata
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    // Remember token lekérése - javítva
    public function getRememberToken()
    {
        return $this->tokens()
            ->where('expiry_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->value('token');
    }

    // Remember token beállítása - javítva
    public function setRememberToken($value)
    {
        // Töröljük a felhasználó összes korábbi remember tokenét
        $this->deleteRememberToken();

        // Létrehozunk egy új tokent
        $this->tokens()->create([
            'device' => 0, // Asztali eszköz
            'token' => $value,
            'expiry_date' => now()->addDays(7) // 7 napos érvényesség
        ]);
    }

    // Remember token törlése - új metódus
    public function deleteRememberToken()
    {
        return $this->tokens()
            ->where('device', 0)
            ->delete();
    }

    // Remember token neve
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    // Jogosultságok ellenőrzése a panelhez
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin(); // Csak adminok férhetnek hozzá
    }

    // Admin jogosultság ellenőrzése
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    // Hibakeresési segédmetódus - add hozzá
    public function attemptLogin($email, $password)
    {
        // Naplózás fejlesztés közben
        \Log::debug("Attempting login for: {$email}");

        $user = self::where('email', $email)->first();

        if (!$user) {
            \Log::debug("User not found with email: {$email}");
            return false;
        }

        if (!$user->isAdmin()) {
            \Log::debug("User is not admin: {$email}");
            return false;
        }

        if (!\Hash::check($password, $user->password)) {
            \Log::debug("Password does not match for: {$email}");
            return false;
        }

        \Log::debug("Login successful for: {$email}");
        return true;
    }
}
