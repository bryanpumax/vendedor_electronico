<?php  function  url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    $host=$_SERVER['HTTP_HOST'];
    $directorio="/vendedor_electronico/";
    return $protocol . "://" .$host.$directorio  ;
}
$urls=url();?>
 <script  src="<?=$urls?>assets/js/jquery-3.4.1.slim.min.js" >  </script> 
 <script  src="<?=$urls?>assets/js/jquery.min.js" >  </script> 
<script src="<?=$urls?>assets/js/jquery-3.5.1.min.js" >  </script>
<script src="<?=$urls?>assets/js/bootstrap.min.js"> </script>
<script src="<?=$urls?>assets/js/bootstrap.bundle.min.js"> </script>
 <script src="<?=$urls?>assets/js/js.cookie.js"> </script>
 <script src="<?=$urls?>assets/js/jquery-scrollLock.min.js"> </script>
 <script src="<?=$urls?>assets/js/jquery.scrollbar.min.js"> </script>
  
<?php include($urls."assets/plugins/datables/js.php");?>
<script src="<?=$urls?>assets/plugins/sweetalert/sweetalert2.9.js"> </script>
<script src="<?=$urls?>assets/js/argon.js?v=1.2.0"> </script>
<script src="<?=$urls?>assets/animacion/validacion_boostrap.js"> </script>
<script src="<?=$urls?>assets/animacion/menu.js"> </script>