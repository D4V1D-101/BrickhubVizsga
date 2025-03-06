<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUser  extends EloquentUserProvider
{
    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $model = $this->createModel();

        // Betöltjük a felhasználót az azonosítója alapján
        $user = $model->where($model->getAuthIdentifierName(), $identifier)->first();

        if (!$user) {
            return null;
        }

        // Ellenőrizzük, hogy a felhasználónak van-e érvényes tokenje
        $validToken = $user->tokens()
            ->where('token', $token)
            ->where('expiry_date', '>', now())
            ->first();

        return $validToken ? $user : null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Ellenőrizzük, hogy a felhasználó valóban User típusú
        if (!($user instanceof \App\Models\User)) {
            throw new \InvalidArgumentException('Expected instance of User.');
        }

        // Ellenőrizzük, hogy van-e már token, és ha nincs, akkor hozunk létre egyet
        $existingToken = $user->tokens()
            ->where('device', 0) // Vagy a megfelelő device érték
            ->where('expiry_date', '>', now())
            ->first();

        if ($existingToken) {
            // Ha van már token, frissítjük
            $existingToken->update([
                'token' => $token,
                'expiry_date' => now()->addDays(7) // Beállíthatod a megfelelő lejárati időt
            ]);
        } else {
            // Ha nincs, létrehozunk egy újat
            $user->tokens()->create([
                'device' => 0, // Állítsd be a megfelelő értéket
                'token' => $token,
                'expiry_date' => now()->addDays(7) // Beállíthatod a megfelelő lejárati időt
            ]);
        }
    }
}
