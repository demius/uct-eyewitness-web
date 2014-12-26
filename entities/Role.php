<?php

namespace Entities;

class Role extends \Spot\Entity {
    protected static $table = 'roles';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'          => ['type' => 'string', 'required' => true],
            'description'   => ['type' => 'string', 'unique' => true, 'required' => true],
            'rights'        => ['type' => 'integer', 'required' => true, 'default' => 0]
        ];
    }
}