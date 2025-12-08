<?php

namespace App\Class;

use App\Models\Setting;

class RoleManager
{
    public static function getAcl($pageName, $role, $action = 'view')
    {

        $setting = Setting::where('name', 'role')->first()?->value;

        if($role == null || $role == 'admin'){
            return true;
        }

        if (! $setting) {
            return false;
        }




        // Role not found
        if (! isset($setting[$role][$pageName])) {
            return false;
        }

        $actions = $setting[$role][$pageName];
        // If deny is true → always deny
        if (!empty($actions['deny'])) {
            return false;
        }

        // If specific action exists → return it
        if (isset($actions[$action])) {
            return (bool) $actions[$action];
        }


        // Default: deny if action is not defined
        return false;
    }


}
