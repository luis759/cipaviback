<?php
class proyectos_modelo{
    private $db;
    private $proyectos;
    /*
    LA TABLAS DE proyectos ES C4PT_PR4Y
    ID:int /not null
    IDEMP:int /not null
    IDPROY:int /not null
    NCONT:nvarchar(50,0) /not null
    NOMBRE:nvarchar(MAX,0) /not null
    FECHA:Datetime/not null
    FINI:Datetime/not null
    FFIN:Datetime/not null
    NIT:numeric(18,0)/not null
    CLIENTE:nvarchar(300,0) /not null
    VALORINICIAL:numeric(18,3)/not null
    VALORADICION:numeric(18,3)/not null
    VALFINAL:numeric(18,3)/not null
    NOADICIONES:numeric(18,3)/not null
    OBSERVA:nvarchar(MAX,0) /not null
    ADMINPOR:numeric(18,3)/not null
    ADMINVAL:numeric(18,3)/not null
    IMPREPOR:numeric(18,3)/not null
    IMPREVAL:numeric(18,3)/not null
    UTILPOR:numeric(18,3)/not null
    UTILVAL:numeric(18,3)/not null
    IVAPOR:numeric(18,3)/not null
    IVAVAL:numeric(18,3)/not null
    ACTIVO:int /not null
    usuario:numeric(18,0)/not null
    temporal:Datetime/not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->proyectos=array();
    }
    public function get_proyectos(){
        $sql = "SELECT *,('000'+convert(varchar,IDPROY,3)+'-'+NCONT)NOMBREGLO FROM C4PT_PR4Y where activo= '1'";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->proyectos,$row);
        }
        return $this->proyectos;
    }
    public function get_proyectos_Bycod_emp($CODIGO,$EMPR){
        $sql = "SELECT * FROM C4PT_PR4Y WHERE activo= '1' AND IDPROY='".$CODIGO."' AND IDEMP=".strval($EMPR)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->proyectos,$row);
        }
        return $this->proyectos;
    }
    public function get_proyectos_ByFechaVigente($FECHAS,$EMPR){
        
        $FECHA=date("Y-m-d", strtotime($FECHAS));
        $sql = "SELECT * FROM C4PT_PR4Y_VIGENTES('".$EMPR."','".$FECHA."')";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->proyectos,$row);
        }
        return $this->proyectos;
    }
}
?>