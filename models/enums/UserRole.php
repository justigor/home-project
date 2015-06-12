<?php

namespace app\models\enums;

use yii2mod\enum\helpers\BaseEnum;

/**
 * Class UserRole
 * @package app\models\enums
 */
class UserRole extends BaseEnum
{
    const ROOT = 'root';
    const ADMIN = 'admin';
    const USER = 'user';

    public static $list = [
        self::ROOT  => 'Root',
        self::ADMIN => 'Admin',
        self::USER  => 'User',
    ];
}