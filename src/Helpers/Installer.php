<?php

namespace aBillander\Installer\Helpers;

class Installer
{
    /**
     * If application is already installed.
     *
     * @return bool
     */
    public static function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }
}
