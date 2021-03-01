   <?php 
 
 echo '<script>localStorage.setItem("ruta","'."https://lab-mrtecks.com/app_php/vendedor_electronico/".'")</script>';
 ?>
 <html>

 <head>
       <title>Vendedor electronico</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/css/nucleo.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
         <link rel="stylesheet" href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/css/argon.css?v=1.2.0" type="text/css">
         <link rel="icon" type="image/jpg" href="assets/imagen/logo.png">  
         <?php 
   $ruta=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/assets/plugins/datables/css.php";
     
         include $ruta;?>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
         <link rel="stylesheet" href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/css/all.min.css" type="text/css">
  
         <META HTTP-EQUIV="Expires" CONTENT="10:00:00 GMT">


         <link href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/plugins/EasyAutocomplete/easy-autocomplete.min.css" rel="stylesheet"
                 type="text/css">
         <link href="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/plugins/EasyAutocomplete/easy-autocomplete.themes.min.css" rel="stylesheet"
                 type="text/css">
        <script src="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/plugins/EasyAutocomplete/jquery-1.11.2.min.js"></script>
 
         <script src="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js" type="text/javascript">
         </script>
       
 </head>

	  
 <body  >
 <!-- Chart de facebook -->
 <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="117875962228473"
  theme_color="#0A7CFF"
  logged_in_greeting="Hola un gusto conversar contigo necesitas ayuda con su pedido"
  logged_out_greeting="Hola un gusto conversar contigo necesitas ayuda con su pedido">
      </div>