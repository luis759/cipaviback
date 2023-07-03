<?php
class reportetransportedet_modelo{
    private $db;
    private $reportetransportedet;
    /*
    LA TABLAS DE DETALLES_DEL_REPORTES ES TNQ4_C4T1_D2T1
    ID:int /not null
    IDEMP:int /not null
    NORC:int /not null
    NOVIAJE:int /not null
    CARGA:nvarchar(100) /not null
    LUGARCARGUE:nvarchar(100) /not null
    HORASALIDA:time(7)/not null
    KILOMSALIDA:numeric(18,3) /not null
    LUGARDESCARGUE:nvarchar(100) /not null
    HORALLEGADA:time(7)/not null
    KILOMLLEGADA:numeric(18,3) /not null
    VOLUMENMT3:numeric(18,3) /not null
    ACTIVO:int /not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->reportetransportedet=array();
    }
    public function get_reportetransportedet(){
        $sql = "SELECT * FROM TNQ4_C4T1_D2T1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransportedet,$row);
        }
        return $this->reportetransportedet;
    }
    public function reg_reportetransportedet($IDEMP,$NORC,$DETALLE){
  
        $sql = "SELECT MAX(ID) as Maximo FROM TNQ4_C4T1_D2T1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransportedet,$row);
        }
       $valorMaximo=($this->reportetransportedet[0]['Maximo'])+count($DETALLE)+1;
       
       for ($i = 0; $i < count($DETALLE); $i++) {
        $NOVIAJE=$DETALLE[$i]['NOVIAJE'];
        $CARGA=$DETALLE[$i]['CARGA'];
        $LUGARCARGUE=$DETALLE[$i]['LUGARCARGUE'];
        $LUGARDESCARGUE=$DETALLE[$i]['LUGARDESCARGUE'];
        $HORASALIDA=date('H:i', strtotime($DETALLE[$i]['HORASALIDA']));
        $HORALLEGADA=date('H:i', strtotime($DETALLE[$i]['HORALLEGADA']));
        $KILOMSALIDA=(float)$DETALLE[$i]['KILOMSALIDA'];
        $KILOMLLEGADA=(float)$DETALLE[$i]['KILOMLLEGADA'];
        $VOLUMENMT3=(float)$DETALLE[$i]['VOLUMENMT3'];

        $sql = "INSERT INTO TNQ4_C4T1_D2T1 ( IDEMP,NORC,NOVIAJE,CARGA,LUGARCARGUE,LUGARDESCARGUE,HORASALIDA,KILOMSALIDA,KILOMLLEGADA,HORALLEGADA,VOLUMENMT3,VERSIONES,ACTIVO) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?)";
        $params = array($IDEMP,$NORC,$NOVIAJE,$CARGA,$LUGARCARGUE,$LUGARDESCARGUE,$HORASALIDA,$KILOMSALIDA,$KILOMLLEGADA,$HORALLEGADA,$VOLUMENMT3, '1', '1');
        $stmt = sqlsrv_query( $this->db, $sql, $params);
         if( $stmt === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
         }
         return array("UltimoId"=>$valorMaximo,"Paso"=>true,"Veces"=>count($DETALLE));
    }
    
    public function get_detalles_NORC_EMP($NORC,$IDEMP){
        $sql = "SELECT * FROM TNQ4_C4T1_D2T1 where  IDEMP=".strval($IDEMP)." AND NORC=".strval($NORC)." AND ACTIVO=1 ORDER BY NOVIAJE ASC";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransportedet,$row);
        }
        return $this->reportetransportedet;
    }
}
?>