<?php
class equipos_modelo{
    private $db;
    private $equipos;
    /*
    LA TABLAS DE equipos ES TNQ4_2Q53
    ID:int /not null
    IDEMP:int /not null
    CODIGO:nvarchar(50,0) /not null
    NOMBRE:nvarchar(150,0) /not null
    DESCRIPCION:nvarchar(250,0) /not null
    FECHACOMPRA:Datetime/not null
    UNIDADMEDIDA:nvarchar(50,0) /not null
    TIPOUSO:nvarchar(50,0) /not null
    NOACTIVO:nvarchar(50,0) /not null
    MUNICIPIOMATRICULA:nvarchar(100,0) /not null
    FECHAMATRICULA:Datetime/not null
    MARCA:nvarchar(50,0) /not null
    LINEA:nvarchar(50,0) /not null
    NOACTIVO:nvarchar(50,0) /not null
    MODELO:int /not null
    CILINDRADA:nvarchar(50,0) /not null
    COLOR:nvarchar(50,0) /not null
    SERVICIO:nvarchar(50,0) /not null
    CLASEVEHICULO:nvarchar(50,0) /not null
    TIPOCARROCERIA:nvarchar(50,0) /not null
    COMBUSTIBLE:nvarchar(50,0) /not null
    CAPACIDAD:nvarchar(50,0) /not null
    NUMEROMOTOR:nvarchar(50,0) /not null
    PROPNIT:nvarchar(50,0) /not null
    COMBUSTIBLE:numeric(18,0)/not null
    PROPNOMBRE:nvarchar(150,0) /not null
    ACTIVO:int /not null
    USUARIO:numeric(18,0)/not null
    temporal:Datetime/not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->equipos=array();
    }
    public function get_equipos(){
        $sql = "SELECT *,(convert(varchar,CODIGO,3)+'-'+NOMBRE) as NOMBREGLO  FROM TNQ4_2Q53 where activo = '1'";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->equipos,$row);
        }
        return $this->equipos;
    }
    public function get_equipos_ByCodigo($codigo,$EMPR){
        $sql = "SELECT * ,(convert(varchar,CODIGO,3)+'-'+NOMBRE) as NOMBREGLO FROM TNQ4_2Q53 where activo= '1' AND codigo='".$codigo."' AND IDEMP=".strval($EMPR)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->equipos,$row);
        }
        return $this->equipos;
    }
}
?>