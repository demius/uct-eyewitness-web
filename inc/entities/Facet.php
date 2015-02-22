<?php

namespace Eyewitness\Entities;

class Facet extends \Spot\Entity {
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