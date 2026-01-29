<?php

include_once "vendor/autoload.php";

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controller\TorneoController;
use App\Controller\EquipoController;
use App\Class\Equipo;
use App\Class\Torneo;


$router = new RouteCollector();


$router->get('/',function (){
    include_once "app/View/principal.php";
});

$router->post('/torneo/create', [TorneoController::class, 'create']);
$router->get('/equipo/{id}',[EquipoController::class, 'show']);

$router->get('torneo/rellenarEquipos', function(){
   $equipo1 = Equipo::getEquipoById(1);
   $equipo2 = Equipo::getEquipoById(2);

   $torneo = new Torneo("Prueba", DateTime::createFromFormat('Y-m-d', "2016-04-05"), 4000);
   $torneo->inscribirEquipo($equipo1);
   $torneo->inscribirEquipo($equipo2);

   echo json_encode($torneo);
});


//Resolución de rutas
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}
catch(HttpRouteNotFoundException $e){
    return "Ruta no encontrada";
}
// Print out the value returned from the dispatched function
echo $response;
