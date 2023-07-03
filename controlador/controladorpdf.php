<?php 
require_once('src/dompdf/autoload.inc.php');
require_once("modelo/reportescamprin.php");
require_once("modelo/reportescamseg.php");
require_once("modelo/responsable.php");
require_once("modelo/empresas.php");
require_once("modelo/equipos.php");
require_once("modelo/usuario.php");
require_once("modelo/proyectos.php");
require_once("modelo/reportetransporteprin.php");
require_once("modelo/reportetransportedet.php");
$proyectos=new proyectos_modelo(); 
$usuario=new usuario_modelo(); 
$equipos=new equipos_modelo(); 
$empresas=new empresas_modelo(); 
$responsable=new responsable_modelo(); 
$reportescamprin=new reportescamprin_modelo(); 
$reportescamseg=new reportescamseg_modelo();
$reportetransporte=new reportetransporte_modelo(); 
$reportetransportedet=new reportetransportedet_modelo();

use Dompdf\Dompdf;
if($opcion=='pdftiempo' && $IDTIPO==1){
    $NORC1=$NORC;
    $IDEMP1=$IDEMP;
    $dataReporte=$reportescamprin->get_reporte_NORC_EMP($NORC1,$IDEMP1);
    $reportesPrincipal=null;
    if(count($dataReporte)>0){
        $reportesPrincipal=$dataReporte[0];
    }
    if(isset($reportesPrincipal)){
        ob_start();
        require_once("htmlreportes/reportesequipopes.php");
        $html = ob_get_contents();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Letter', 'potrait');
        $dompdf->render();
        ob_get_clean();
        $dompdf->stream("TIEMPOEQUIPO.pdf", array("Attachment" => true));
        header('HTTP/1.1 200 Internal Server Error');
    }else{
        header('HTTP/1.1 404 Internal Server Error');
    }
    
}else if($opcion=='pdftiempo' && $IDTIPO==2){
    $NORC1=$NORC;
    $IDEMP1=$IDEMP;
    $dataReporte=$reportetransporte->get_reporte_NORC_EMP($NORC1,$IDEMP1);
    $reportesPrincipal=null;
    if(count($dataReporte)>0){
        $reportesPrincipal=$dataReporte[0];
    }
    if(isset($reportesPrincipal)){
        ob_start();
        require_once("htmlreportes/reportetransporte.php");
        $html = ob_get_contents();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'Landscape');
        $dompdf->render();
        ob_get_clean();
        $dompdf->stream("Transporte.pdf", array("Attachment" => TRue));
        header('HTTP/1.1 200 Internal Server Error');
    }else{
        header('HTTP/1.1 404 Internal Server Error');
    }
    
}else{

    $NORC1=4;
    $IDEMP1=1;
    $dataReporte=$reportetransporte->get_reporte_NORC_EMP($NORC1,$IDEMP1);
    $reportesPrincipal=null;
    if(count($dataReporte)>0){
        $reportesPrincipal=$dataReporte[0];
    }
    if(isset($reportesPrincipal)){
        ob_start();
        require_once("htmlreportes/reportetransporte.php");
        $html = ob_get_contents();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'Landscape');
        $dompdf->render();
        ob_get_clean();
        $dompdf->stream("Transporte.pdf", array("Attachment" => false));
        header('HTTP/1.1 200 Internal Server Error');
    }else{
        header('HTTP/1.1 404 Internal Server Error');
    }
}

?>