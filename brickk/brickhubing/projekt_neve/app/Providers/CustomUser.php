<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUser extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Modified validation logic to properly check hashed password
        $plain = $credentials['password'];
        $hashedPassword = $user->getAuthPassword();

        return $this->hasher->check($plain, $hashedPassword);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        \Log::debug('Auth attempt with ID: ' . $identifier);
        \Log::debug('Checking token: ' . $token);
        $model = $this->createModel();

        // First retrieve the user by ID
        $user = $model->where($model->getAuthIdentifierName(), $identifier)->first();

        if (!$user) {
            return null;
        }

        // Check if the user has a valid token that matches
        $validToken = $user->tokens()
            ->where('token', $token)
            ->where('expiry_date', '>', now())
            ->first();

        return $validToken ? $user : null;
    }
}
