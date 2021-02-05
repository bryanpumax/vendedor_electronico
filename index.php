<?php 
  $ruta_head_inicio=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/head_inicio.php";
  $ruta_menu=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/menu.php";
 
 include $ruta_head_inicio;
   
 include $ruta_menu;
 
?>
 

<div class="container-fluid">
        <div class="row">
                <div class="col-xs-12 col-xl-12 col-md-12 col-sm-12 col-lg-12 panel-derecho ">  
                        <?php
                      
date_default_timezone_set('America/Guayaquil');

                    /* $hora = date("H");  */
                    
                    $hora = date("H:i"); 
                 
                    
                    if (($hora>="00:00")!=1 && ($hora<="00:59")!=1) {
                    echo "Servidor esta haciendo su respaldo puedes revisar tus facturas";
                    } else {
                    
                  $página_inicio = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/app_php/vendedor_electronico/algoritmo/buscarbdd.php');
echo $página_inicio;  
    
                    }
                    
                       ?>
                        <br>
                        <br>
                        <div class="vista col-sm-12 col-lg-12 col-dm-12 col-xs-12">tabla</div>
                </div>

        </div>

 
        <div class="modal fade" id="modal_producto" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title text-uppercase" id="exampleModalLabel"
                                                name="exampleModalLabel"></h5>
                                        <button type="button" class="btn-danger" onclick="cerrarmodal()"
                                                aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                        <div class="cuerpo col-xs-12 col-md-12 col-sm-12 col-lg-12"></div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                onclick="cerrarmodal()">Cerrar</button>

                                </div>
                        </div>
                </div>
        </div>


        <?php 
        $ruta_head_final=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/head_final.php";
        include $ruta_head_final;?>