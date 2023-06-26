<?php
class reportescamprin_modelo{
    private $db;
    private $reportescamprin;
    private $reportescamprin2;
    /*
    LA TABLAS DE PRINCIPAL_DEL_REPORTES ES TNQ4_C4M1_N4RC
    ID:int /not null
    IDEMP:int /not null
    IDPROY:int /not null
    NORC:int /not null
    FECHA:Datetime/not null
    CODIGO:nvarchar(50)/not null
    RESPONSABLE:int/not null
    LECINI:numeric(18,3)/not null
    LECFIN:numeric(18,3)/not null
    GALONES:numeric(18,3)/not null
    ACEITE:numeric(18,3)/not null
    OBSERVA:nvarchar(300)/not null
    HORAS:numeric(18,3)/not null
    USUARIO:int/not null
    TEMPORAL:Datetime/not null
    ACTIVO:int /not null
    VERSIONES:int /not null
    */
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->reportescamprin=array();
        $this->reportescamprin2=array();
    }
    public function getNumeroNORC($IDEMP){
        $sql = "SELECT MAX(NORC) as Maximo FROM TNQ4_C4M1_N4RC WHERE IDEMP='".strval($IDEMP)."' ";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamprin2,$row);
        }
        return $this->reportescamprin2[0]['Maximo']+1;
    }
    public function reg_reportescamprin($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$LECINI,$LECFIN,$GALONES,$ACEITE,$OBSERVA,$HORAS,$USUARIO){
  
        $sql = "SELECT MAX(ID) as Maximo FROM TNQ4_C4M1_N4RC";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamprin,$row);
        }
       $valorMaximo=$this->reportescamprin[0]['Maximo']+1;
       $valorNORC=$this->getNumeroNORC($IDEMP);
       $sql = "INSERT INTO TNQ4_C4M1_N4RC (IDEMP,IDPROY,FECHA,CODIGO,RESPONSABLE,LECINI,LECFIN,GALONES,ACEITE,OBSERVA,HORAS,USUARIO,NORC,TEMPORAL,ACTIVO,VERSIONES) VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $params = array($IDEMP,$IDPROY,$FECHA,$CODIGO,$RESPONSABLE,$LECINI,$LECFIN,$GALONES,$ACEITE,$OBSERVA,$HORAS,$USUARIO,$valorNORC,date("Y-m-d H:i:s"),1,1);

       $stmt = sqlsrv_query( $this->db, $sql, $params);
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }else{
            return array("UltimoId"=>$valorMaximo,"NORC"=>$valorNORC,"Paso"=>true);
        }
    }

    public function get_reporte_NORC_EMP($NORC,$IDEMP){
        $sql = "SELECT * FROM TNQ4_C4M1_N4RC where activo= '1' AND IDEMP=".strval($IDEMP)." AND NORC=".strval($NORC)."";
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamprin,$row);
        }
        return $this->reportescamprin;
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
        $sql = "SELECT * FROM TNQ4_C4M1_N4RC where activo= '1' ".$valorWhere;
        $stmt = sqlsrv_query(  $this->db, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            array_push($this->reportescamprin,$row);
        }
        return $this->reportescamprin;
    }
}
?>