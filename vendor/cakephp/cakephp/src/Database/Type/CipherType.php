<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 2017-03-11
 * Time: 10:03 AM
 */

namespace App\Database\Type;

use App\Database\Driver;
use App\Database\Type;
use App\Utility;

class CipherType extends Type
{
    public function toDatabase($value, Driver $driver)
    {
        return Security::encrypt($value, Security::salt());
    }

    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }
        return Security::decrypt($value, Security::salt());
    }
}