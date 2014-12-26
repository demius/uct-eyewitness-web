<?php
require 'vendor/autoload.php';
require 'inc/service-locator.php';

require 'entities/User.php';
require 'entities/Role.php';
require 'entities/UserRole.php';

require 'entities/mappers/UserMapper.php';

$app = new \Slim\Slim();

$app->get('/users', function () {
    $spot = get_spot_instance();
    $mapper = $spot->mapper('Entities\User');
    echo json_encode($mapper->all()->toArray());
});

$app->get('/users/:id', function ($id) {
    $spot = get_spot_instance();
    $mapper = $spot->mapper('Entities\User');
    echo json_encode($mapper->get($id));
});

$app->post('/users', function(){
    /*
    $entity = $mapper->build([
        'display_name' => 'Alexis van der Merwe',
        'email_address' => 'demius@gmail.com',
        'password' => 'Willy21@'
    ]);*/
    //$result = $mapper->save($entity);
});

$app->run();