<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class StudyType extends Entity {
    protected static $table = "study_types";

    public static function fields(){
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'description'   => ['type' => 'string', 'required' => true]
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
        return [
            'studies' => $mapper->hasMany($entity, 'Eyewitness\Entities\Study', 'type'),
        ];
    }
}