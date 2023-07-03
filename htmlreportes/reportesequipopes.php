<?php 

$nombre_fichero = 'assets/Icono.png';
$im = file_get_contents($nombre_fichero);    
$logo = 'data:image/png;base64,' . base64_encode($im);
$Horas=$reportescamseg->get_horas_NORC_EMP($NORC,$IDEMP);
$DataEquipos=$equipos->get_equipos_ByCodigo($reportesPrincipal['CODIGO'],$reportesPrincipal['IDEMP']);
$DataResponsable=$responsable->get_responsable_Bycod_emp($reportesPrincipal['RESPONSABLE'],$reportesPrincipal['IDEMP']);
$dataEmpresas=$empresas->get_empresas_ByIDEMP($reportesPrincipal['IDEMP']);
$DataUSuario=$usuario->get_usuario_ByCedula($reportesPrincipal['USUARIO']);
?>
<html>
        
    <head>
 <!-- Latest compiled and minified CSS -->
    </head>
    <body  style="margin:0px;height:100%;">
      <div style="border: 1px solid;border-radius: 30px;height:92%;margin:0px;">
      <table style="width:100%;line-height:unset;table-layout:fixed;">
          <tr style=" border-bottom:1px solid;line-height:unset;vertical-align: middle;">
            <th style="width: 33.33%;height:auto;padding:25px 0px; border-bottom:1px solid;">
              <img src="<?php echo $logo;?>" style="width:75%;padding:0px;margin:0px; display:block;">
              <div style="font-size:12px;margin:0px;padding:0px;"> 
                <label >CI</label ><label style="color:yellow;">VILES-</label ><label >PA</label ><label style="color:yellow;"  >VIMENTOS-</label ><label  >VI</label ><label style="color:yellow;">AS</label >
                <p style="margin:0px;"> NIT: 900.021.319-9</p>
              </div>
             </th>
            <th style="width: 33.33%;padding:0px;text-align: center; border-bottom:1px solid;border-left: 1px solid; border-right: 1px solid;">REPORTERIA TIEMPO EQUIPO PESADO</th>
            <th style="width: 33.33%;padding:0px; border-bottom:1px solid;">
             <p>
             CEDULA USUARIO: <?php 
             if(COUNT($DataUSuario)>0){
              echo $DataUSuario[0]['Cedula'];
             }else{
              echo "";
             }
             
             ?>
             </p> 
             <p>
             NOMBRE USUARIO: <?php
               if(COUNT($DataUSuario)>0){
                echo $DataUSuario[0]['Nombre'];
               }else{
                echo "";
               }
            ?>
             </p> 
            </th>
          </tr>
      </table>
      <table style="border: 1px solid;margin:15px; width:100%; table-layout:fixed;"> 
          <tr >
          <th style="width: 70%; border-right: 1px solid;text-align:center;">
            <p style="display:block;">EMPRESA: <?php 
            if(COUNT($dataEmpresas)>0){
                echo $dataEmpresas[0]['RAZON'];
               }else{
                echo "";
               }?></p>
            <p style="display:block;">RESPONSABLE: <?php 
            if(COUNT($DataResponsable)>0){
              echo $DataResponsable[0]['NOMBRES'];
             }else{
              echo "";
             }?></p>
            
          </th>
           <th style="width: 30%;padding:0px;">
                <p style="border: 1px solid black;border-radius: 50%;margin:10px 35px;width:100%;padding:0px;color:red;">
                          <?php echo $reportesPrincipal['NORC'];?>
                </p>
                <table style="border: 1px solid;margin:20px; width:100%; table-layout:fixed;">
                <tr style="vertical-align: middle;padding:0px;">
                <td style="width: 33.33%;height:auto;border-right: 1px solid; margin:0px;padding:0px;">
                <?php echo $reportesPrincipal['FECHA']->format('d');?>  
                </td>
                <td style="width: 33.33%;height:auto;border-right: 1px solid; margin:0px;padding:0px;">
                <?php echo $reportesPrincipal['FECHA']->format('m');?>  
                </td>
                <td style="width: 33.33%;height:auto; margin:0px;padding:0px;">
                <?php echo $reportesPrincipal['FECHA']->format('Y');?>  
                </td>
                </tr>
                </table>      
            </th>
          </tr>
        </table>
        <table style="border: 1px solid;margin:20px; width:100%;table-layout:fixed;"> 
          <tr style="padding:0px;">
          <td style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">MAQUINARIA:  </label><label><?php
            
            if(COUNT($DataEquipos)>0){
              echo $DataEquipos[0]['NOMBRE'];
             }else{
              echo "";
             }?></label><label style="margin:0px;padding:0px;font-weight:bold;">  CODIGO:  </label><label><?php if(COUNT($DataEquipos)>0){
              echo $DataEquipos[0]['CODIGO'];
             }else{
              echo "";
             }?>  </label>
          </td>
          </tr>
          <tr style="padding:0px;">
          <td style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">MAQUINARIA DESCRIPCION:  </label><label><?php if(COUNT($DataEquipos)>0){
              echo $DataEquipos[0]['DESCRIPCION'];
             }else{
              echo "";
             }?></label>
          </td>
          </tr>
          <tr style="padding:0px;">
          <td style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">LECTURA HOROMETRO INICIAL:  </label><label><?php 
            $str=strval($reportesPrincipal['LECINI']);
            $valor=str_replace('.','-',$str);
            $valor2=str_replace(',','.',$valor);
            $valor3=str_replace('-',',',$valor2);
          echo $valor3;
            ?></label>
          </td>
          </tr>
          <tr style="padding:0px;overflow-wrap: break-word;word-wrap: break-word;">
          <td style="border-bottom: 1px solid;margin:0px;overflow-wrap: break-word;width:300px;">
            <label style="margin:0px;padding:0px;font-weight:bold;">LECTURA HOROMETRO FINAL:  </label><label><?php 
            $str=strval($reportesPrincipal['LECFIN']);
            $valor=str_replace('.','-',$str);
            $valor2=str_replace(',','.',$valor);
            $valor3=str_replace('-',',',$valor2);
          echo $valor3;
            ?></label>
          </td>
          </tr>
          <tr style="padding:0px;">
          <td style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">COMBUSTIBLE:  </label><label><?php 
              $str=strval($reportesPrincipal['GALONES']);
              $valor=str_replace('.','-',$str);
              $valor2=str_replace(',','.',$valor);
              $valor3=str_replace('-',',',$valor2);
            echo $valor3;
            
            ?> Galones</label>
          </td>
          </tr>
          <tr style="padding:0px;">
          <td style="margin:0px;">
            <label style="margin:0px;padding:0px;font-weight:bold;word-wrap: break-word;">ACEITE HIDRAULICO:  </label><label> </label><label><?php 
            $str=strval($reportesPrincipal['ACEITE']);
            $valor=str_replace('.','-',$str);
            $valor2=str_replace(',','.',$valor);
            $valor3=str_replace('-',',',$valor2);
          echo $valor3;
            ?> Galones</label>
          </td>
          </tr>
        </table>

        <table style="border: 1px solid;margin:20px; width:100%;table-layout:fixed;"> 
          <tr style="padding:0px;">
          <th style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">Hora de inicio:  </label>
          </th>
          <th style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">Hora de Fin:  </label>
          </th>
          <th style="border-bottom: 1px solid;margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;">Horas Trabajadas:  </label>
          </th>
          </tr>
          <?php 
          for ($i = 0; $i < COUNT($Horas); $i++) {
            
          ?>
          <tr style="padding:0px;text-align:Center;">
          <td style="margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;"><?php echo $Horas[$i]['HORADESDE']->format('h:i A');?></label>
          </td>
          <td style="margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;"><?php echo $Horas[$i]['HORAHASTA']->format('h:i A');?></label>
          </td>
          <td style="margin:0px;word-wrap: break-word;">
            <label style="margin:0px;padding:0px;font-weight:bold;"><?php echo (int)$Horas[$i]['HORAS'];?></label>
          </td>
          </tr>
          <?php 
            }
          ?>
        </table>
        <h3 style="text-align:Center;"> Horas trabajadas Maquina:  <?php echo (int)$reportesPrincipal['HORAS'];?>  </h3>
        <div style="margin:20px; width:100%;height:auto;word-wrap: break-word;">
          OBSERVACIONES: <?php echo $reportesPrincipal['OBSERVA'];?>
        </div>
        <table style="margin:20px 0px 10px 0px; width:100%;table-layout:fixed;"> 
          <tr>
            <th style="width:33.33%;">
           </th>
           <th style="width:33.33%;">
           <p style="border-top:1px solid;">FIRMA USUARIO</p>
           </th>
           <th style="width:33.33%;">
           </th>
          </tr>
        </table>
    </div>
      <p style="margin:5px 0px 0px 0px;text-align: center;ont-size:18px;">OFICINA PALERMO</p>
      <p style="margin:0px;text-align: center;font-size:12px;">Calle 40 No. 7P-400 Condominio Industrial Terpel Manzana E Lote 3 y 4  Telefono:871 85 95</p>
      <p style="margin:0px;text-align: center;font-size:12px;">Celular:313 817 8719 - E-mail:cipaviltda@gmail.com - Palermo-Huila.</p>
      <body>
</html>
<?php 

?>