<?php  include("http://localhost/vendedor_electronico/estructuracion_html/head_inicio.php");
include("http://localhost/vendedor_electronico/estructuracion_html/menu.php");
 
?>
 
 
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                       <?php
                    
                       $página_inicio = file_get_contents('http://localhost/vendedor_electronico/algoritmo/buscarbdd.php');
echo $página_inicio;
                       ?>
                       <br>
                       <br>
                       <div class="vista">tabla</div>
                        </div>

                </div>
     



<!-- Modal -->
<div class="modal fade" id="modal_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLabel" name="exampleModalLabel"></h5>
        <button type="button" class="btn-danger" onclick="cerrarmodal()" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
       <div class="cuerpo" ></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  onclick="cerrarmodal()">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
  
    
                <?php include("http://localhost/vendedor_electronico/estructuracion_html/head_final.php");?>
           