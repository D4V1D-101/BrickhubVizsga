<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUser  extends EloquentUserProvider
{
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];
        $hashedPassword = $user->getAuthPassword();

        return $this->hasher->check($plain, $hashedPassword);
    }

    public function retrieveByToken($identifier, $token)
    {
        \Log::debug('Auth attempt with ID: ' . $identifier);
        \Log::debug('Checking token: ' . $token);

        $model = $this->createModel();
        $user = $model->where($model->getAuthIdentifierName(), $identifier)->first();

        if (!$user) {
            \Log::debug('User  not found.');
            return null;
        }

        $validToken = $user->tokens()
            ->where('token', $token)
            ->where('expiry_date', '>', now())
            ->first();

        if (!$validToken) {
            \Log::debug('Invalid token or token expired.');
        }

        return $validToken ? $user : null;
    }
}
