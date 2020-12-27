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
                       <div class="vista">tabla</div>
                        </div>

                </div>
     

                <?php include("http://localhost/vendedor_electronico/estructuracion_html/head_final.php");?>