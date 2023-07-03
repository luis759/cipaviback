<?php
class reportescamseg_modelo{
    private $db;
    private $reportescamseg;
    /*
    LA TABLAS DE DETALLES_DEL_REPORTES ES APP2_M52S_D2T1
    ID:int /not null
    IDEMP:int /not null
    NORC:int /not null
    HORADESDE:time(7) /not null
    HORAHASTA:time(7) /not null
    HORAS:numeric(18,3) /not null
    TEMPORAL:datetime /not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->reportescamseg=array();
    }
    public function get_reportescamseg(){
        $sql = "SELECT * FROM TNQ4_C4M1_H4R1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamseg,$row);
        }
        return $this->reportescamseg;
    }
    public function reg_reportescamseg($IDEMP,$NORC,$TIEMPO){
  
        $sql = "SELECT MAX(ID) as Maximo FROM TNQ4_C4M1_H4R1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamseg,$row);
        }
       $valorMaximo=($this->reportescamseg[0]['Maximo'])+count($TIEMPO)+1;
       
       for ($i = 0; $i < count($TIEMPO); $i++) {
        $HORADESDE=date('H:i', strtotime($TIEMPO[$i]['HORADESDE']));
        $HORAHASTA=date('H:i', strtotime($TIEMPO[$i]['HORAHASTA']));
        $HORAS=(float)$TIEMPO[$i]['HORAS'];
        $sql = "INSERT INTO TNQ4_C4M1_H4R1 ( IDEMP,NORC,HORADESDE,HORAHASTA,HORAS,TEMPORAL,VERSIONES,ACTIVO) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($IDEMP,$NORC,$HORADESDE,$HORAHASTA,$HORAS, date("Y-m-d H:i:s"), '1', '1');
        $stmt = sqlsrv_query( $this->db, $sql, $params);
         if( $stmt === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
         }
         return array("UltimoId"=>$valorMaximo,"Paso"=>true,"Veces"=>count($TIEMPO));
    }
    public function get_horas_NORC_EMP($NORC,$IDEMP){
        $sql = "SELECT * FROM TNQ4_C4M1_H4R1 where  IDEMP=".strval($IDEMP)." AND NORC=".strval($NORC)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamseg,$row);
        }
        return $this->reportescamseg;
    }
}
?>