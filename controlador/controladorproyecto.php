<?php
//Llamada al modelo del especies
require_once("modelo/proyectos.php");
$proyectos=new proyectos_modelo(); 

//Validacion para uso de algunas funciones especificas
if($opcion=='getproyectos'){
    $ValorRetorno=array("proyectos"=>$proyectos->get_proyectos());
    echo json_encode($ValorRetorno);
}else if (!isset($valorUso) && $opcion=='reg'){
    //Pagina de ingreso para el registro de proyectos
}

?>