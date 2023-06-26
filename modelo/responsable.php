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
    public function reg_responsable($IDEMP,$COD,$CEDULA,$NOMBRES,$USUARIO){
        $sql = "SELECT * FROM APP0_R2SP WHERE COD=".strval($COD)." AND IDEMP=".strval($IDEMP)." AND ACTIVO=1";
        $stmt = sqlsrv_query(  $this->db, $sql );
        $existe=false;
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
           $existe=true;
        }
        if(!$existe){
            
                $sql = "SELECT MAX(ID) as Maximo FROM APP0_R2SP";
                $stmt = sqlsrv_query(  $this->db, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
        
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    array_push($this->responsable,$row);
                    }
                $valorMaximo=$this->responsable[0]['Maximo']+1;
            $sql = "INSERT INTO APP0_R2SP (ID,IDEMP,COD,CEDULA,Nombres,Vigente,usuario,Activo,TEMPORAL,VERSIONES) VALUES ( ?,?,?,?,?,?,?,?,?,?)";
            $params = array($valorMaximo,$IDEMP,$COD,$CEDULA,$NOMBRES,1,$USUARIO,1,date("Y-m-d H:i:s"),1);
     
            $stmt = sqlsrv_query( $this->db, $sql, $params);
             if( $stmt === false) {
                 die( print_r( sqlsrv_errors(), true) );
             }else{
                 return array("CEDULA"=>$CEDULA,"ID"=>$valorMaximo,"COD"=>$COD,"IDEMP"=>$IDEMP,"Paso"=>true);
             }
        }else{
            return array("CEDULA"=>$CEDULA,"COD"=>$COD,"IDEMP"=>$IDEMP,"message"=>"El Responsable esta activo y existe","Paso"=>false);
        }
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