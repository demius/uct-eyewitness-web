<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class UserRole extends Entity {
    protected static $table = "user_roles";

    public static function fields(){
        return [
            'user_id'   => ['type' => 'integer', 'primary' => true],
            'role_id'   => ['type' => 'integer', 'primary' => true]
        ];
    }
}