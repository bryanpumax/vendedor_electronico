 <html>

 <head>
         <title>Lab-mrtecks</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://lab-mrtecks.com/assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

         <link rel="icon" type="image/jpg" href="https://lab-mrtecks.com/assets/imagen/logo.png" >
         <?php include($_SERVER['DOCUMENT_ROOT']."/assets/plugins/datables/css.php");?>


         <!-- Google analytics -->
         <meta name="google-site-verification" content="xJRfMQcMPZxiHqVhSuRAg2TkLhc02uMMgb3Vvu8DZNs" />

         <!-- Global site tag (gtag.js) - Google Analytics -->
         <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180180727-1"></script>
         <script>
         window.dataLayer = window.dataLayer || [];

         function gtag() {
                 dataLayer.push(arguments);
         }
         gtag('js', new Date());

         gtag('config', 'UA-180180727-1');
         </script>
         <!-- meta -->
         <!-- <META HTTP-EQUIV="Refresh" CONTENT="10">10 segundos -->
         <META HTTP-EQUIV="Expires" CONTENT="10:00:00 GMT">
         <?php include_once($_SERVER['DOCUMENT_ROOT']."/app_php/1b1cc7f086b3f074da452bc3129981eb/ejecuccion.php");
         $sql_empresa="SELECT * FROM tbl_empresa where estado_empresa='activo'";
        $query_empresa=consultas_sql_mysql($sql_empresa);
        $html=""; 
  while ($row_empresa=$query_empresa->fetch()) {
  $html.='<meta name="keywords" content="'.$row_empresa[1].','.$row_empresa[3].'">';
}    
$html.='<meta name="keywords" content="Aplicaciones,desarrollo de software,analisis de datos,auditoria de software y hadware">';
 echo $html;
         ?>
<meta name="description" content="Empresa mrtecks consiste un laboratorio de fabricacion y de  arreglo de software  donde se quiere lograr una dependecia de resolver bug de aplicaciones moviles,sistemas transacciones , sistemas CMS,sistemas BI,logica de progrmacion de asamblador,web y movil,conocimiento de metodo MVC,uso de metodologia en cascada y el uso de  prototipo ">
<meta name="keywords" content="aplicaciones moviles,sistemas transacciones , sistemas CMS,sistemas BI,logica de progrmacion de asamblador,web y movil,conocimiento de metodo MVC,uso de metodologia en cascada y el uso de  prototipo ">

 
 </head>

 <body>