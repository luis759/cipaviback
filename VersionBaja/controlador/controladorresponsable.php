<?php
//Llamada al modelo del responsable
require_once("modelo/responsable.php");
$responsable=new responsable_modelo(); 

//Validacion para uso de algunas funciones especificas
if($opcion=='getresponsable'){
    $ValorRetorno=array("responsables"=>$responsable->get_responsable());
    echo json_encode($ValorRetorno);
}else if (!isset($valorUso) && $opcion=='reg'){
    //Pagina de ingreso para el registro de responsable
}

?>