<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 2017-03-11
 * Time: 10:03 AM
 */

namespace App\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use Cake\Utility\Security;

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