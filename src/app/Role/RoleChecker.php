<?php

namespace App\Role;

use App\User;

class RoleChecker {

    public static function check(User $user, $role){
        // Admin has everything
        if ($user->hasRole(UserRole::ROLE_ADMIN)) {
            return true;
        }
        else if($user->hasRole(UserRole::ROLE_GERENTE)) {
            $managementRoles = UserRole::getAllowedRoles(UserRole::ROLE_GERENTE);

            if (in_array($role, $managementRoles)) {
                return true;
            }
        }

        return $user->hasRole($role);
    }
}
