<?php
//Llamada al modelo del reportes
require_once("modelo/reportescamprin.php");
require_once("modelo/reportescamseg.php");
require_once("modelo/reportetransporteprin.php");
require_once("modelo/reportetransportedet.php");
$reportescamprin=new reportescamprin_modelo(); 
$reportescamseg=new reportescamseg_modelo();
$reportetransporte=new reportetransporte_modelo(); 
$reportetransportedet=new reportetransportedet_modelo();
//Validacion para uso de algunas funciones especificas
if($opcion=='getreportesByIDEMP-IDPROY-DESDEYHASTA'){
    echo  json_encode(array('Reportes'=>$reportescamprin->get_reporte_By_IDEMP_FECHA_CODIGO($IDEMP,$DESDE,$HASTA,$CODIGO)));
}
else if (!isset($valorUso) && $opcion=='regReport1'){
    if(empty($_POST['OBSERVA'])){
        $OBSERVA=NULL;
    }else{
        $OBSERVA=$_POST['OBSERVA'];
    }
    if(empty($_POST['GALONES'])){
        $GALONES=NULL;
    }else{
        $GALONES=(float)$_POST['GALONES'];
    }
    if(empty($_POST['ACEITE'])){
        $ACEITE=NULL;
    }else{
        $ACEITE=(float)$_POST['ACEITE'];
    }
    $TIEMPOS=json_decode($_POST['TIEMPOS'],true);
    $IDEMP=$_POST['IDEMP'];
    $IDPROY=$_POST['IDPROY'];
    $CODIGO=$_POST['CODIGO'];
    $RESPONSABLE=$_POST['RESPONSABLE'];
    $USUARIO=$_POST['USUARIO'];
    $FECHA=$_POST['FECHA'];
    $LECINI=(float)$_POST['LECINI'];
    $LECFIN=(float)$_POST['LECFIN'];
    $HORAS=(float)$_POST['HORAS'];
    $valorprincipal=$reportescamprin->reg_reportescamprin($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$LECINI,$LECFIN,$GALONES,$ACEITE,$OBSERVA,$HORAS,$USUARIO);
    $NORC=$valorprincipal['NORC'];
    $retorno=array("Principal"=>$valorprincipal,"Horas"=>$reportescamseg->reg_reportescamseg($IDEMP,$NORC,$TIEMPOS));
    echo json_encode($retorno);
}else if (!isset($valorUso) && $opcion=='regReport2'){
    if(empty($_POST['OBSERVA'])){
        $OBSERVA=NULL;
    }else{
        $OBSERVA=$_POST['OBSERVA'];
    }
    if(empty($_POST['HORATANQUEO'])){
        $HORATANQUEO=NULL;
    }else{
        $HORATANQUEO=$_POST['HORATANQUEO'];
    }
    if(empty($_POST['KILOMETRAJETANQUEO'])){
        $KILOMETRAJETANQUEO=NULL;
    }else{
        $KILOMETRAJETANQUEO=(float)$_POST['KILOMETRAJETANQUEO'];
    }
    if(empty($_POST['GALONESTANQUEADOS'])){
        $GALONESTANQUEADOS=NULL;
    }else{
        $GALONESTANQUEADOS=(float)$_POST['GALONESTANQUEADOS'];
    }
    $DETALLE=json_decode($_POST['DETALLE'],true);
    $IDEMP=$_POST['IDEMP'];
    $IDPROY=$_POST['IDPROY'];
    $CODIGO=$_POST['CODIGO'];
    $RESPONSABLE=$_POST['RESPONSABLE'];
    $USUARIO=$_POST['USUARIO'];
    $FECHA=$_POST['FECHA'];
    $NIVELCOMBINICIO=(int)$_POST['NIVELCOMBINICIO'];
    $NIVELCOMBFIN=(int)$_POST['NIVELCOMBFIN'];

    $valorprincipal=$reportetransporte->reg_reportetransporte($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$NIVELCOMBINICIO,$NIVELCOMBFIN,$OBSERVA,$HORATANQUEO,$KILOMETRAJETANQUEO,$GALONESTANQUEADOS,$USUARIO);
    $NORC=$valorprincipal['NORC'];
    $retorno=array("Principal"=>$valorprincipal,"Detalles"=>$reportetransportedet->reg_reportetransportedet($IDEMP,$NORC,$DETALLE));
    echo json_encode($retorno);
}

?>