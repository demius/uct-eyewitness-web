<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class User extends Entity {
    protected static $table = 'users';
    protected static $mapper = '\Eyewitness\Entities\Mappers\UserMapper';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'display_name'  => ['type' => 'string', 'required' => true],
            'email_address' => ['type' => 'string', 'unique' => true, 'required' => true],
            'password'      => ['type' => 'integer', 'required' => true],
            'activated'     => ['type' => 'boolean','required' => true],
            'locked'        => ['type' => 'boolean', 'required' => true],
            'registered_on' => ['type' => 'datetime', 'value' => new \DateTime(), 'required' => true]
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
        return [
            'roles' => $mapper->hasManyThrough($entity, 'Eyewitness\Entities\Role', 'Eyewitness\Entities\UserRole', 'role_id', 'user_id'),
            'studies' => $mapper->hasManyThrough($entity, 'Eyewitness\Entities\Study', 'Eyewitness\Entities\UserStudy', 'study_id', 'user_id')
        ];
    }
}