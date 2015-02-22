<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class UserStudy extends Entity {
    protected static $table = "user_studies";

    public static function fields(){
        return [
            'user_id'   => ['type' => 'integer', 'primary' => true],
            'study_id'   => ['type' => 'integer', 'primary' => true],
            'permissions' => ['type' => 'integer', 'value' => 0, 'required' => true]
        ];
    }
}