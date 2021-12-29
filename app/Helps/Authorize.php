<?php

namespace App\Helps;

class Authorize
{
    /**
     * Check and determine if the admin is authorized to make request.
     * 
     * @return boolean
     */
    public static function is_admin()
    {
        if (
            auth()->check() &&
            auth()->user()->role->is_admin == 1
        ) {
            return true;
        }

        return false;
    }

    /**
     * Check and determine if the user is authorized to make request.
     * 
     * @return boolean
     */
    public static function is_user()
    {
        if (
            auth()->check() &&
            auth()->user()->role->is_admin == 0
        ) {
            return true;
        }

        return false;
    }
}
