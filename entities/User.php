<?php

namespace Entities;

class User extends \Spot\Entity {
    protected static $table = 'users';
    protected static $mapper = '\Entities\Mappers\UserMapper';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'display_name'  => ['type' => 'string', 'required' => true],
            'email_address' => ['type' => 'string', 'unique' => true, 'required' => true],
            'password'      => ['type' => 'integer', 'required' => true],
            'registered_on' => ['type' => 'datetime', 'value' => new \DateTime(), 'required' => true]
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
        return [
            'roles' => $mapper->hasManyThrough($entity, 'Entities\Role', 'Entities\UserRole', 'role_id', 'user_id'),
            'studies' => $mapper->hasManyThrough($entity, 'Entities\Study', 'Entities\UserStudy', 'study_id', 'user_id')
        ];
    }
}