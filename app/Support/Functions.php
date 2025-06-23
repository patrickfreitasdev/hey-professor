<?php

use App\Models\User;

if (!function_exists('user')) {

    function user(): ?User
    {
        $user = auth()->user();

        if ($user instanceof User) {
            return $user;
        }

        return null;
    }
}
