<?php
namespace Eyewitness\Entities\Mappers;

class UserMapper extends \Spot\Mapper {
    public function save(\Spot\EntityInterface $entity, array $options = []) {
        if($entity->isNew()){
            $pass = $entity->get('password');
            $entity->set('password', password_hash($pass, PASSWORD_DEFAULT));
        }
        return parent::save($entity, $options);
    }
}