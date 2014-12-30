<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class Study extends Entity {
    protected static $table = 'studies';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'title'         => ['type' => 'string', 'required' => true],
            'description'   => ['type' => 'string'],
            'type'          => ['type' => 'integer', 'required' => true],
            'created_by'    => ['type' => 'integer', 'required' => true],
            'created_on'    => ['type' => 'datetime', 'value' => new \DateTime(), 'required' => true],
            'started_on'    => ['type' => 'datetime'],
            'ended_on'      => ['type' => 'datetime']
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
        return [
            'creator' => $mapper->belongsTo($entity, 'Eyewitness\Entities\User', 'created_by'),
            'collaborators' => $mapper->hasManyThrough($entity, 'Eyewitness\Entities\User', 'Eyewitness\Entities\UserStudy', 'user_id', 'study_id'),
            'materials' => $mapper->hasManyThrough($entity, 'Eyewitness\Entities\Material', 'Eyewitness\Entities\StudyMaterial', 'material_id', 'study_id'),
        ];
    }
}