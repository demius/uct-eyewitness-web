<?php

namespace Eyewitness\Entities;

class MaterialFacet extends \Spot\Entity {
    protected static $table = "material_facets";

    public static function fields(){
        return [
            'material_id'   => ['type' => 'integer', 'primary' => true],
            'facet_id'      => ['type' => 'integer', 'primary' => true],
        ];
    }
}