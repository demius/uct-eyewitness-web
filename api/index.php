<?php

require '../vendor/autoload.php';

require '../inc/entities/User.php';
require '../inc/entities/Role.php';
require '../inc/entities/Study.php';
require '../inc/entities/StudyType.php';
require '../inc/entities/Material.php';

require '../inc/entities/UserRole.php';
require '../inc/entities/UserStudy.php';

require '../inc/entities/mappers/UserMapper.php';

/* Configure the Slim application & container */
$app = new \Slim\Slim();

$app->container->singleton('db_context', function(){
    $spot_cfg = new Spot\Config();
    $spot_cfg->addConnection('mysql', [
        'dbname' => 'eyewitness-web',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ]);
    return new \Spot\Locator($spot_cfg);
});

/*
    Routes:
        /users
        /users/:id
*/
$app->get('/users', function () use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\User');
    $users = $mapper->all()->toArray();

    respond($app, ["body" => json_encode($users)]);
});

$app->post('/users', function() use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\User');
    $params = json_decode($app->request->getBody());

    $entity = $mapper->build([
        'display_name' => $params->display_name,
        'email_address' => $params->email_address,
        'password' => $params->password
    ]);

    if($mapper->save($entity)){
        return respond($app, ["body" => json_encode($entity)]);
    }
    respond('Failed to save the new user.', 500);
});

$app->get('/users/:id', function ($id) use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\User');
    $entity = $mapper->get($id);

    if($entity){
        return respond($app, ["body" => json_encode($entity)]);
    }
    respond($app, ["status" => 404]);
});

$app->put('/users/:id', function($id) use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\User');
    $entity = $mapper->get($id);

    if($entity) {
        $params = json_decode($app->request->getBody());

        $entity->display_name = $params->display_name;
        $entity->email_address = $params->email_address;
        $entity->locked = $params->locked;

        return respond($app, ["status" => 204]);
    }
    respond($app, ["status" => 404]);
});

$app->delete('/users/:id', function($id) use($app) {
    respond($app, ["status" => 204]);
});

/*
    Routes:
        /materials
        /materials/:id
*/
$app->get('/materials', function () use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\Material');
    $materials = $mapper->all()->toArray();

    respond($app, ["body" => json_encode($materials)]);
});

$app->post('/materials', function() use($app) {
    $mapper = $app->db_context->mapper('Eyewitness\Entities\Material');
    $params = json_decode($app->request->getBody());

    $entity = $mapper->build([
        'description' => $params->description,
        'path' => $params->path,
        'relative_uri' => $params->relative_uri,
        'mime_type' => $params->mime_type,
        'filename' => $params->filename,
        'original_filename' => $params->original_filename
    ]);

    if($mapper->save($entity)){
        return respond($app, ["body" => json_encode($entity)]);
    }
    respond('Failed to save the new material.', 500);
});

/* Slim application bootstrap */
$app->run();

/* Utility methods */
function respond($app, $options = array()) {
    $defaults = [
        "body" => null,
        "status" => 200,
        "content_type" => 'application/json'];

    $opts = (object) array_merge($defaults, $options);

    $app->response->setStatus($opts->status);
    $app->response->headers->set('Content-Type', $opts->content_type);

    if($opts->body){
        echo $opts->body;
    }
}