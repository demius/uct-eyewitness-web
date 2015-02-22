<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class Material extends Entity {
    protected static $table = 'materials';

    public static function fields()
    {
        return [
            'id'                => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'description'       => ['type' => 'string', 'required' => true],
            'filename'          => ['type' => 'string', 'required' => true],
            'original_filename' => ['type' => 'string', 'required' => true],
            'relative_uri'      => ['type' => 'string', 'required' => true],
            'path'              => ['type' => 'string', 'required' => true],
            'mime_type'         => ['type' => 'string', 'required' => true]
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
        return [
            'materials' => $mapper->hasManyThrough($entity, 'Eyewitness\Entities\Facet', 'Eyewitness\Entities\MaterialFacet', 'facet_id', 'material_id'),
        ];
    }
}