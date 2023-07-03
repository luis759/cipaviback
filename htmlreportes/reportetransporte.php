<?php 

$nombre_fichero = 'assets/Icono.png';
$im = file_get_contents($nombre_fichero);    
$logo = 'data:image/png;base64,' . base64_encode($im);
$dataDetalle=$reportetransportedet->get_detalles_NORC_EMP($NORC1,$IDEMP1);
$DataEquipos=$equipos->get_equipos_ByCodigo($reportesPrincipal['CODIGO'],$reportesPrincipal['IDEMP']);
$DataResponsable=$responsable->get_responsable_Bycod_emp($reportesPrincipal['RESPONSABLE'],$reportesPrincipal['IDEMP']);
$dataEmpresas=$empresas->get_empresas_ByIDEMP($reportesPrincipal['IDEMP']);
$DataUSuario=$usuario->get_usuario_ByCedula($reportesPrincipal['USUARIO']);
$dataProyectos=$proyectos->get_proyectos_Bycod_emp($reportesPrincipal['IDPROY'],$reportesPrincipal['IDEMP']);
?>


<html style="margin:15px;">
        
    <head>
 <!-- Latest compiled and minified CSS -->
    </head>
    <body  style="margin:0px;height:100%;">
      <div style="border: 1px solid;height:97%;margin:0px;">
      <table style="width:100%;line-height:unset;border-collapse: collapse;table-layout: fixed;">
          <tr style=" border-bottom:1px solid;line-height:unset;vertical-align: middle;margin:0px;padding:0px;">
            <th style="width: 23.33%;height:25px;padding:25px 0px; border-bottom:1px solid;">
              <img src="<?php echo $logo;?>" style="width:75%;padding:0px;margin:0px; display:block;height:25px;">
              <div style="font-size:10px;margin:0px;padding:0px;"> 
                <label >CI</label ><label style="color:yellow;">VILES-</label ><label >PA</label ><label style="color:yellow;"  >VIMENTOS-</label ><label  >VI</label ><label style="color:yellow;">AS</label >
                <p style="margin:0px;"> NIT: 900.021.319-9</p>
              </div>
             </th>
            <th style="width: 53.33%;padding:0px;height:25px;text-align: center; border-bottom:1px solid;border-left: 1px solid; border-right: 1px solid;font-size:20px;margin:0px;">REPORTE TRANSPORTE DE MATERIAL</th>
            <th style="width: 23.33%;padding:0px; border-bottom:1px solid;height:25px;">
             <p style="border-bottom: 1px solid; padding:0px;width:100%; margin:10px 0px;">
             CIP-F-368
             </p> 
             <p style="border-bottom: 1px solid;padding:0px;width:100%;margin:10px 0px;">
             Version <?php echo $reportesPrincipal['VERSIONES'];?>
             </p> 
             <p > 
             Pag 1 de 1
             </p> 
            </th>
          </tr>
      </table>

      <table style="margin:5px; width:100%; height:10px;table-layout:fixed;padding:0px;border-collapse: collapse;"> 
                        <tr style="margin:0px;padding:0px;height:13px;line-height:unset;">
                        <th style="margin:0px;padding:0px !important;width: 12%;text-align:center;height:13px;">
                        <table style="margin:0px;padding:0px;width:100%;font-size:12px;border: 1px solid;">
                        <tr style="vertical-align: middle; margin:0px;padding:0px;height:12px; text-align: center" >
                                        <td style="width: 33.33%; margin:0px;padding:0px;border-bottom: 1px solid;border-right: 1px solid;">
                                    DIA
                                    </td>
                                    <td style="width: 33.33%;margin:0px;padding:0px;border-bottom: 1px solid;border-right: 1px solid;">
                                    MES
                                    </td>
                                    <td style="width: 33.33%;height:15px; margin:0px;padding:0px;border-bottom: 1px solid;">
                                AÑO
                                </td>
                                </tr>
                                <tr style="border: 1px solid;vertical-align: middle; margin:0px;padding:0px;line-height:unset;height:10px; text-align: center" >
                                        <td style="width: 33.33%; 1px solid; margin:0px;padding:0px;border-right: 1px solid;">
                                        <?php echo $reportesPrincipal['FECHA']->format('d');?>  
                                    </td>
                                    <td style="width: 33.33%;margin:0px;padding:0px;border-right: 1px solid;">
                                    <?php echo $reportesPrincipal['FECHA']->format('m');?>  
                                    </td>
                                    <td style="width: 33.33%; margin:0px;padding:0px;">
                                    <?php echo $reportesPrincipal['FECHA']->format('Y');?>  
                                </td>
                                </tr>
                        </table>            
                        </th>

                        <th style="border: 1px solid;line-height:unset;margin:0px;padding:0px;width: 10%;text-align:center;height:13px;">
                        <table style="border: 1px solid;margin:0px;padding:0px; height:auto;width:100%; table-layout:fixed;font-size:14px;">
                        <tr style="vertical-align: middle; margin:0px;padding:0px;height:auto; text-align: center;border-bottom: 1px solid;font-size:10px;" >
                            
                        <?php 
                        $Array= array("","","","","","","");
                        $Array[((int)$reportesPrincipal['FECHA']->format('N'))-1]="background:#a6a6a6;";
                        
                        ?>                           
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[0]; ?>">L</td>
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[1]; ?>">M</td>
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[2]; ?>">M</td>
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[3]; ?>">J</td>
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[4]; ?>">V</td>
                            <td style="margin:0px;padding:0px;border-right:1px solid;<?php echo $Array[5]; ?>">S</td>
                            <td style="margin:0px;padding:0px;<?php echo $Array[6]; ?>">D</td>

                            </tr>
                        </table>            
                        </th>

                        <th style="margin:0px;padding:0px !important;width: 70%;text-align:center;height:13px;">
                        <table style="border: 1px solid;margin:0px !important;padding:0px;font-size:11px; height:13px;width:100%; table-layout:fixed;font-size:14px;">
                        <tr style="vertical-align: middle;line-height:unset; margin:0px;padding:0px;height:13px; text-align: center;border-bottom: 1px solid" >
                            <td style="margin:0px;padding:0px; border-bottom: 1px solid;">OBRA</td>
                            </tr>
                            <tr style="vertical-align: middle; margin:0px;padding:0px;height:10px; font-size:11px; text-align: center;" >
                            <td style="margin:0px;padding:0px;">
                            <?php 
            if(COUNT($dataProyectos)>0){
              echo $dataProyectos[0]['NCONT'];
             }else{
              echo "";
             }?>
                            </td>
                            </tr> 
                        </table>            
                        </th>
                        
                        <th style="margin:0px;padding:0px;width: 15%;text-align:center;height:13px;border: 1px solid;">
                        <?php echo $reportesPrincipal['NORC'];?>        
                        </th>
                        </tr>

        </table>


  <table style="margin:5px; padding:0px;width:100%;font-size:11px;border-spacing: 0;;table-layout: fixed;"> 
          
        <tr style="padding:0px !important;height:20px;margin:0px;text-align:center;">
          <th style="border:1px solid;">EQUIPOS</th>
          <th style="border:1px solid;">PLACA</th>
          <th style="border:1px solid;">CONDUCTOR</th>
          <th style="border:1px solid;">IDENTIFICACION</th>
          <th style="border:1px solid;">HORA INGRESO</th>  
          <th style="border:1px solid;">HORA SALIDA</th>  
          <th style="border:1px solid;">HORA TRABAJADAS</th>    
        </tr>
        <?php
         $cantidaddehoras=0;
          for ($i = 0; $i < COUNT($dataDetalle); $i++) {
        $diff = $dataDetalle[$i]['HORALLEGADA']->diff($dataDetalle[$i]['HORASALIDA']);
        $minutes = $diff->days * 24 * 60;
        $minutes += $diff->h * 60;
        $minutes += $diff->i;

        $cantidaddehoras= $cantidaddehoras+ceil($minutes/60);
          }

?>
        <tr style="padding:0px !important;height:20px;margin:0px;text-align:center;">
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($DataEquipos)>0){ echo $DataEquipos[0]['NOMBRE']; }else{ echo ""; }?></td>
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($DataEquipos)>0){ echo $DataEquipos[0]['CODIGO']; }else{ echo ""; }?></td>
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($DataResponsable)>0){ echo $DataResponsable[0]['NOMBRES'];}else{echo "";}?></td>
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($DataResponsable)>0){ echo $DataResponsable[0]['CEDULA'];}else{echo "";}?></td>
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($dataDetalle)>0){echo $dataDetalle[0]['HORASALIDA']->format('h:i A');}else{echo "";}?></td>  
          <td style="border:1px solid;word-wrap: break-word;"><?php if(COUNT($dataDetalle)>0){echo $dataDetalle[COUNT($dataDetalle)-1]['HORALLEGADA']->format('h:i A');}else{echo "";}?></td>  
          <td style="border:1px solid;word-wrap: break-word;"><?php echo $cantidaddehoras;?></td>    
        </tr>
        </table>


        <table style="margin:5px; width:100%;padding:0px;table-layout: fixed;font-size:12px;line-height:inherit;border-spacing: 0;;table-layout: fixed;"> 
                  <tr style="padding:0px;height:20px;margin:0px;text-align:center;line-height:inherit;">
                  <th style="border:1px solid; margin:0px; width:20%">
                    Control de Kilometraje
                  </th>
                  <th style="border:1px solid;width:25%">
                    Control de Nivel de Combustible
                  </th>
                  <th style="border:1px solid;margin:0px;">
                    Aprovisionamiento de  Combustible
                  </th>
                  </tr>
                  <tr style="padding:0px;height:20px;margin:0px;text-align:center;">
                  <td style="padding:0px;">
                    <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;border:1px solid;">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">INICIO DIA</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">FINAL DIA</td>
                    </tr>  
                  </table>
                  </td>
                  <td style="padding:0px;">
                    <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">INICIO DIA</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">FINAL DIA</td>
                    </tr>  
                  </table>
                  </td>
                  <td  style="padding:0px;">
                  <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">HORA</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">NIVEL INICIAL</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">NIVEL FINAL</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">KILOMETRAJE</td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">GALONES</td>
                    </tr>  
                  </table>
                  </td>
                  </tr>
                  <tr style="padding:0px;height:20px;margin:0px;text-align:center;">
                  <td style="padding:0px;">
                    <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;height:18px;table-layout: fixed;">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;"><?php if(COUNT($dataDetalle)>0){echo (int)$dataDetalle[0]['KILOMSALIDA'];}else{echo "";}?></td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;"><?php if(COUNT($dataDetalle)>0){echo (int)$dataDetalle[COUNT($dataDetalle)-1]['KILOMLLEGADA'];}else{echo "";}?></td>
                    </tr>  
                  </table>
                  </td>
                  <td style="padding:0px;">
                  <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;">
                        <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;font-size:10px;">
                          <tr  style="padding:0px;margin:0px;">
                          <td style="padding:0px;margin:0px;font-weight:700">E</td>
                          <?php 
                          
                          for ($i = 1; $i <= 8; $i++) {
                          if($i<= $reportesPrincipal['NIVELCOMBINICIO']){
                            ?>
                            <td style="padding:0px;margin:0px;height:2px;widht:2px;border:1px solid;background:#a6a6a6;"></td>
                            <?php
                          }else{
                          ?>
                          <td style="padding:0px;margin:0px;height:2px;widht:2px;border:1px solid;"></td>
                          <?php
                          }
                        }
                          ?>
                            <td style="padding:0px;margin:0px;font-weight:700" >F</td>
                          </tr>
                        </table>
                      </td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;">
                      <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;font-size:10px;">
                          <tr style="padding:0px;margin:0px;">
                          <td style="font-weight:700;text-align:center">E</td>
                          <?php 
                          
                          for ($i = 1; $i <= 8; $i++) {
                          if($i<= $reportesPrincipal['NIVELCOMBFIN']){
                            ?>
                            <td style="padding:0px;margin:0px;height:2px;widht:2px;border:1px solid;background:#a6a6a6;"></td>
                            <?php
                          }else{
                          ?>
                          <td style="padding:0px;margin:0px;height:2px;widht:2px;border:1px solid;"></td>
                          <?php
                          }
                        }
                          ?>
                            <td style="font-weight:700;text-align:center" >F</td>
                          </tr>
                        </table>
                    </td>
                    </tr>  
                  </table>
                  </td>
                  <td  style="padding:0px;">
                  <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;">
                    <tr  style="padding:0px;margin:0px;">
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;"><?php if(is_null($reportesPrincipal['HORATANQUEO'])){echo "";}else{echo  $reportesPrincipal['HORATANQUEO']->format('h:i A');} ?></td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">  
                       <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;font-size:10px;">
                          <tr style="padding:0px;margin:0px;">
                          <td style="font-weight:700;text-align:center">E</td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="font-weight:700;text-align:center" >F</td>
                          </tr>
                        </table>
                      </td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;">  
                       <table style="padding:0px;margin:0px;width:100%;border-spacing: 0;table-layout: fixed;font-size:10px;">
                          <tr style="padding:0px;margin:0px;">
                          <td style="font-weight:700;text-align:center">E</td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="height:2px;widht:2px;border:1px solid;"></td>
                            <td style="font-weight:700;text-align:center" >F</td>
                          </tr>
                        </table>
                      </td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;"><?php if(is_null($reportesPrincipal['KILOMETRAJETANQUEO'])){echo "";}else{echo (int)$reportesPrincipal['KILOMETRAJETANQUEO'];}?></td>
                      <td style="padding:0px;margin:0px;text-align:center;border:1px solid;word-wrap: break-word;"><?php if(is_null( $reportesPrincipal['GALONESTANQUEADOS'])){echo "";}else{echo  $reportesPrincipal['GALONESTANQUEADOS'];}?></td>
                    </tr>  
                  </table>
                  </td>
                  </tr>

        </table>

        <table style="margin:5px; padding:0px;width:100%;font-size:11px;border-spacing: 0;table-layout: fixed;"> 
          
          <tr style="padding:0px !important;height:20px;margin:0px;text-align:center;">
            <th style="border:1px solid;width:5%;">VIAJE</th>
            <th style="border:1px solid;width:20%;">CARGA</th>
            <th style="border:1px solid;width:25%;">LUGAR DE CARGUE</th>
            <th style="border:1px solid;width:7%;">HORA</th>
            <th style="border:1px solid;width:10%;">KILOMETRAJE SALIDA</th>  
            <th style="border:1px solid;width:25%;">LUGAR DESCARGUE</th>  
            <th style="border:1px solid;width:7%;">HORA</th>    
            <th style="border:1px solid;width:10%;">KILOMETRAJE LLEGADA</th> 
            <th style="border:1px solid;width:7%;">VOLUMEN mts3</th>    
          </tr>
          <?php 
          for ($i = 1; $i <= 10; $i++) {
            if(COUNT($dataDetalle)>=$i){
              ?>
               <tr style="padding:0px !important;height:20px;margin:0px;text-align:center;">
                <td style="border:1px solid;height:25px"><?php echo $dataDetalle[$i-1]['NOVIAJE'];?></td>
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['CARGA'];?></td>
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['LUGARCARGUE'];?></td>
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['HORASALIDA']->format('h:i A');?></td>
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo (int)$dataDetalle[$i-1]['KILOMSALIDA'];?></td>  
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['LUGARDESCARGUE'];?></td>  
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['HORALLEGADA']->format('h:i A');?></td>    
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo (int)$dataDetalle[$i-1]['KILOMLLEGADA'];?></td> 
                  <td style="border:1px solid;word-wrap: break-word;"><?php echo $dataDetalle[$i-1]['VOLUMENMT3'];?></td>   
                </tr>
               <?php
            }else{
               ?>
               <tr style="padding:0px !important;height:20px;margin:0px;text-align:center;">
                <td style="border:1px solid;height:25px"><?php echo $i;?></td>
                  <td style="border:1px solid;word-wrap: break-word;"></td>
                  <td style="border:1px solid;word-wrap: break-word;"></td>
                  <td style="border:1px solid;word-wrap: break-word;"></td>
                  <td style="border:1px solid;word-wrap: break-word;"></td>  
                  <td style="border:1px solid;word-wrap: break-word;"></td>  
                  <td style="border:1px solid;word-wrap: break-word;"></td>    
                  <td style="border:1px solid;word-wrap: break-word;"></td> 
                  <td style="border:1px solid;word-wrap: break-word;"></td>   
                </tr>
               <?php
            }
          }
          ?>
          </table>
        

        <table style="margin:20px 5px 10px 5px; width:100%;table-layout:fixed;border-spacing: 0;"> 
          <tr>
            <th style="border:1px solid;width:70%;">
            OBSERVACIONES
           </th>
           <th style="border:1px solid;width:15%;font-size:13px">
            CONDUCTOR FIRMA Y NOMBRE
           </th>
           <th style="border:1px solid;width:15%;font-size:13px">
           FIRMA AUTORIZADA FIRMA Y NOMBRE
           </th>
          </tr>
          <tr>
            <td style="word-wrap: break-word;border:1px solid;height:55px">
            <?php echo $reportesPrincipal['OBSERVA'];?> 
          </td>
          <td style="word-wrap: break-word;border:1px solid;height:55px;padding:20px 0px 0px 0px;">
          <p style="border-top:1px solid;margin:7px 7px 0px 7px;"></p> 
          </td>
          <td style="word-wrap: break-word;border:1px solid;height:55px;padding:20px 0px 0px 0px;">
          <p style="border-top:1px solid;margin:7px 7px 0px 7px;"></p>
          </td>
          </tr>
        </table>
    </div>
     <body>
</html>
<?php 

?>