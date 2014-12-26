<?php
require '../vendor/autoload.php';

require '../entities/User.php';
require '../entities/Role.php';
require '../entities/UserRole.php';

require '../entities/mappers/UserMapper.php';

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

$app->get('/users', function () use($app) {
    $mapper = $app->db_context->mapper('Entities\User');
    respond(json_encode($mapper->all()->toArray()));
});

$app->post('/users', function() use($app) {
    $mapper = $app->db_context->mapper('Entities\User');

    $entity = $mapper->build([
        'display_name' => $app->request->params('display_name'),
        'email_address' => $app->request->params('email_address'),
        'password' => $app->request->params('password')
    ]);

    if($mapper->save($entity)){
        return respond(json_encode($entity));
    }
    respond('Failed to save the new user.', 500);
});

$app->get('/users/:id', function ($id) use($app) {
    $mapper = $app->db_context->mapper('Entities\User');
    respond(json_encode($mapper->get($id)));
});

$app->put('/users/:id', function($id) use($app) {

});

$app->delete('/users/:id', function($id) use($app) {
    $spot = get_spot_instance();
    $mapper = $spot->mapper('Entities\User');
    echo json_encode($mapper->get($id));
});

$app->run();

function respond($body, $http_status = 200, $content_type = 'application/json') {
    $app = new \Slim\Slim();
    $app->response->status($http_status);
    $app->response->headers->set('Content-Type', $content_type);
    echo $body;
}