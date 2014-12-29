<?php

namespace Entities;

class StudyMaterial extends \Spot\Entity {
    protected static $table = "study_materials";

    public static function fields(){
        return [
            'study_id'      => ['type' => 'integer', 'primary' => true],
            'material_id'   => ['type' => 'integer', 'primary' => true]
        ];
    }
}