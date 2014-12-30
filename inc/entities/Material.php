<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class Material extends Entity {
    protected static $table = 'materials';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'description'   => ['type' => 'string', 'required' => true],
            'uri'           => ['type' => 'string'],
            'local_uri'     => ['type' => 'string'],
            'mime_type'     => ['type' => 'string'],
        ];
    }
}