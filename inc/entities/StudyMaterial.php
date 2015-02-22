<?php

namespace Eyewitness\Entities;

use Spot\Entity;

class StudyMaterial extends Entity {
    protected static $table = "study_materials";

    public static function fields(){
        return [
            'study_id'      => ['type' => 'integer', 'primary' => true],
            'material_id'   => ['type' => 'integer', 'primary' => true]
        ];
    }
}