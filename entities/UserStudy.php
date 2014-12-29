<?php

namespace Entities;

class UserStudy extends \Spot\Entity {
    protected static $table = "user_studies";

    public static function fields(){
        return [
            'user_id'   => ['type' => 'integer', 'primary' => true],
            'study_id'   => ['type' => 'integer', 'primary' => true],
            'permissions' => ['type' => 'integer', 'value' => 0, 'required' => true]
        ];
    }
}