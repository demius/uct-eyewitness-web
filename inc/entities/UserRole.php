<?php

namespace Eyewitness\Entities;

class UserRole extends \Spot\Entity {
    protected static $table = "user_roles";

    public static function fields(){
        return [
            'user_id'   => ['type' => 'integer', 'primary' => true],
            'role_id'   => ['type' => 'integer', 'primary' => true]
        ];
    }
}