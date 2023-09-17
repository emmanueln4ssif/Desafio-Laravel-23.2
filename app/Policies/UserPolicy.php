<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function isAdmin(User $user)
        {
            if($user->id == 1 || $user->name == 'Administrador')
                return true;
            else
                
                return false;
        }
}
