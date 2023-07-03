<?php
class responsable_modelo{
    private $db;
    private $responsable;
    /*
    LA TABLAS DE responsable ES APP0_R2SP
    ID:int /not null
    IDEMP:int /not null
    COD:int /not null
    CEDULA:numeric(18,0)/not null
    Nombres:nvarchar(200,0) /not null
    Vigente:int /not null
    usuario:numeric(18,0)/not null
    Activo:int /not null
    temporal:Datetime/not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->responsable=array();
    }
    public function get_responsable(){
        $sql = "SELECT * FROM APP0_R2SP WHERE ACTIVO=1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->responsable,$row);
        }
        return $this->responsable;
    }
    public function get_responsable_Bycod_emp($CODIGO,$EMPR){
        $sql = "SELECT * FROM APP0_R2SP WHERE activo= '1' AND COD='".$CODIGO."' AND IDEMP=".strval($EMPR)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->responsable,$row);
        }
        return $this->responsable;
    }
}
?>