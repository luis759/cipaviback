<?php
//Llamada al modelo del equipos
require_once("modelo/equipos.php");
$equipos=new equipos_modelo(); 

//Validacion para uso de algunas funciones especificas
if($opcion=='getequipos'){
    $ValorRetorno=array("equipos"=>$equipos->get_equipos());
    echo json_encode($ValorRetorno);
}else if (!isset($valorUso) && $opcion=='reg'){
    //Pagina de ingreso para el registro de GRANJAS
}

?>