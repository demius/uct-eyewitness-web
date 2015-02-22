<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class Facet extends Entity {
    protected static $table = 'facets';

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'code'          => ['type' => 'string', 'unique' => true, 'required' => true],
            'description'   => ['type' => 'string', 'required' => true],
        ];
    }
}