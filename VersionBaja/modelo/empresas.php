<?php
class empresas_modelo{
    private $db;
    private $empresas;
    /*
    LA TABLAS DE EMPRESAS ES ACO_2MPR
    IDEMP:int /not null
    RAZON:nvarchar(100,0)/not null
    NIT:numeric(18,0)/not null
    BDCONTABLE:nvarchar(50,0)/not null
    SIGLA:nvarchar(50,0)/not null
    USUARIO:numeric(18,0)/not null
    ACTIVO:int/not null
    temporal:Datetime/not null
    VERSIONES:int/not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->empresas=array();
    }
    public function get_Empresas(){
        $sql = "SELECT * FROM ACO_2MPR";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->empresas,$row);
        }
        return $this->empresas;
    }
    public function get_empresas_ByIDEMP($IDEMP){
        $sql = "SELECT * FROM ACO_2MPR WHERE activo='1' AND IDEMP=".strval($IDEMP);
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->empresas,$row);
        }
        return $this->empresas;
    }
}
?>