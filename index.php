<?php
require_once("db/db.php");
include 'src/Router/Route.php';
include 'src/Router/Router.php';
include 'src/Router/RouteNotFoundException.php';

//Inicializcion de Ruteo de paginas
$router = new Router\Router();
$router->add('/usuarios', function () {
    $opcion='getusuarios';
    require_once("controlador/controlusuario.php");
});
$router->add('/proyectos', function () {
    $opcion='getproyectos';
    require_once("controlador/controladorproyecto.php");
});
$router->add('/proyectos/([0-9]*[- /.]*[0-9]*[- /.]*[0-9]*)/([0-9]*)', function ($FECHA,$IDEMP) {
    $opcion='getproyectosFecha';
    require_once("controlador/controladorproyecto.php");
});
$router->add('/empresas', function () {
    $opcion='getempresas';
    require_once("controlador/controlempresas.php");
});
$router->add('/checkserver', function () {
    echo json_encode(array("succes"=>true));
});
$router->add('/responsables', function () {
    $opcion='getresponsable';
    require_once("controlador/controladorresponsable.php");
});
$router->add('/responsable_reg', function () {
    $opcion='reg';
    require_once("controlador/controladorresponsable.php");
});

$router->add('/pdf/tiempo/([0-9]*)/([0-9]*)/([0-9]*)', function ($IDEMP,$NORC,$IDTIPO) {
    $opcion='pdftiempo'; 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    if(empty($IDEMP) || empty($NORC)|| empty($IDTIPO)){
        header('HTTP/1.1 500 Internal Server Error');
    }else{
        require_once("controlador/controladorpdf.php");
    }
});

$router->add('/pdf2', function () {
    $opcion='pdftiempo2'; 
    require_once("controlador/controladorpdf.php");
});
$router->add('/permisos', function () {
    $opcion='getpermisos';
    require_once("controlador/controladorpermisos.php");
});
$router->add('/equipos', function () {
    $opcion='getequipos';
    require_once("controlador/controlequipos.php");
});
$router->add('/reportes/registro', function () {
    $opcion='regReport1';
    require_once("controlador/controladorreportes.php");
});
$router->add('/reportes/opermaquiyequi', function () {
    $opcion='regReport1';
    require_once("controlador/controladorreportes.php");
});
$router->add('/reportes/controltranscarga', function () {
    $opcion='regReport2';
    require_once("controlador/controladorreportes.php");
});
$router->add('/reportes/([0-9]*)/([0-9A-Za-z]*)/([0-9]*[- /.]*[0-9]*[- /.]*[0-9]*)/([0-9]*[- /.]*[0-9]*[- /.]*[0-9]*)/([0-9]*)', function ($IDEMP,$CODIGO,$DESDE,$HASTA,$IDTIPO) {
    $opcion='getreportesByIDEMP-IDPROY-DESDEYHASTA';
    require_once("controlador/controladorreportes.php");
});
//Ruta de LLamada para las paginas que no se encuentran
$router->add('/.*', function () {
    header('HTTP/1.1 404 Error No Encontrado');
});

$router->route();

?>