<?php
class reportetransporte_modelo{
    private $db;
    private $reportetransporte;
    private $reportetransporte2;
    /*
    LA TABLAS DE PRINCIPAL_DEL_REPORTES ES TNQ4_C4T1_PR3N
    ID:int /not null
    IDEMP:int /not null
    IDPROY:int /not null
    NORC:int /not null
    FECHA:Datetime/not null
    CODIGO:nvarchar(50)/not null
    RESPONSABLE:int/not null
    NIVELCOMBINICIO:int/not null
    NIVELCOMBFIN:int/not null
    HORATANQUEO:time(7)/not null
    KILOMETRAJETANQUEO:numeric(18,3)/not null
    GALONESTANQUEADOS:numeric(18,3)/not null
    OBSERVA:nvarchar(300)/not null 
    USUARIO:int/not null
    TEMPORAL:Datetime/not null
    ACTIVO:int /not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->reportetransporte=array();
        $this->reportetransporte2=array();
    }
    public function getNumeroNORC($IDEMP){
        $sql = "SELECT MAX(NORC) as Maximo FROM TNQ4_C4T1_PR3N WHERE IDEMP='".strval($IDEMP)."' ";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransporte2,$row);
        }
        return $this->reportetransporte2[0]['Maximo']+1;
    }

    public function reg_reportetransporte($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$NIVELCOMBINICIO,$NIVELCOMBFIN,$OBSERVA
    ,$HORATANQUEO,$KILOMETRAJETANQUEO,$GALONESTANQUEADOS,$USUARIO){
  
        $sql = "SELECT MAX(ID) as Maximo FROM TNQ4_C4T1_PR3N";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransporte,$row);
        }
       $valorMaximo=$this->reportetransporte[0]['Maximo']+1;
       $valorNORC=$this->getNumeroNORC($IDEMP);
       $sql = "INSERT INTO TNQ4_C4T1_PR3N (IDEMP,IDPROY,FECHA,CODIGO,RESPONSABLE,NIVELCOMBINICIO,NIVELCOMBFIN,HORATANQUEO,KILOMETRAJETANQUEO,GALONESTANQUEADOS,OBSERVA,USUARIO,NORC,TEMPORAL,ACTIVO,VERSIONES) VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $params = array($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$NIVELCOMBINICIO,$NIVELCOMBFIN,$HORATANQUEO,$KILOMETRAJETANQUEO,$GALONESTANQUEADOS,$OBSERVA,$USUARIO,$valorNORC,date("Y-m-d H:i:s"),1,1);

       $stmt = sqlsrv_query( $this->db, $sql, $params);
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }else{
            return array("UltimoId"=>$valorMaximo,"NORC"=>$valorNORC,"Paso"=>true);
        }
    }

    public function get_reporte_NORC_EMP($NORC,$IDEMP){
        $sql = "SELECT * FROM TNQ4_C4T1_PR3N where activo= '1' AND IDEMP=".strval($IDEMP)." AND NORC=".strval($NORC)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransporte,$row);
        }
        return $this->reportetransporte;
    }

    public function get_reporte_By_IDEMP_FECHA_CODIGO($IDEMP,$FECHADESDE,$FECHAHASTA,$CODIGO){
        $valorWhere="";
        if(empty($IDEMP)){

        }else{
            $valorWhere=$valorWhere."AND IDEMP=".strval($IDEMP);
        }
        if(empty($FECHADESDE) && empty($FECHAHASTA)){

        }else{
            if(empty($valorWhere)){
                $fechade=date("Y-m-d", strtotime($FECHADESDE));
                $fechaha=date("Y-m-d", strtotime($FECHAHASTA));
                $valorWhere=$valorWhere." AND FECHA >='".$fechade."' AND FECHA <='".$fechaha."' ";
            }else{

                $fechade=date("Y-m-d", strtotime($FECHADESDE));
                $fechaha=date("Y-m-d", strtotime($FECHAHASTA));
                $valorWhere=$valorWhere." AND FECHA >='".$fechade."' AND FECHA <='".$fechaha."' ";
            }
        }
        if(empty($CODIGO)){

        }else{
            if(empty($valorWhere)){
                $valorWhere=$valorWhere." AND CODIGO ='".$CODIGO."'";
            }else{
                $valorWhere=$valorWhere." AND CODIGO ='".$CODIGO."'";
            }
        }
        $sql = "SELECT * FROM TNQ4_C4T1_PR3N where activo= '1' ".$valorWhere;
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportetransporte,$row);
        }
        return $this->reportetransporte;
    }
}
?>