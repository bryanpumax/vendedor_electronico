 <?php
  function  url(){
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
$urls=url();
 echo '<script>localStorage.setItem("ruta","'.$urls.'")</script>';
 ?>
 <html>

 <head>
         <title>Vendedor electronico</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="<?=$urls?>assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="<?=$urls?>assets/css/nucleo.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="<?=$urls?>assets/css/argon.css?v=1.2.0" type="text/css">
         <link rel="icon" type="image/jpg" href="assets/imagen/logo.png" >
         <?php include($_SERVER['DOCUMENT_ROOT']."/vendedor_electronico/assets/plugins/datables/css.php");?>

 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <link rel="stylesheet" href="<?=$urls?>assets/css/all.min.css" type="text/css">
         <!-- <META HTTP-EQUIV="Refresh" CONTENT="10">10 segundos -->
         <META HTTP-EQUIV="Expires" CONTENT="10:00:00 GMT">
      
 </head>

 <body>
