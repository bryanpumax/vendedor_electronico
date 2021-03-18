 <?php
  echo '
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">';
             if (isset($_SESSION["usuario"])) {
   $usuario=($_SESSION["cedula"]);
  
 echo ' <a href="" class="text-primary user" >'.$_SESSION["nombre"].'</a> ';
 
} 
        echo '<a class="navbar-brand" href="javascript:void(0)">
          <img src="https://lab-mrtecks.com/app_php/vendedor_electronico/assets/imagen/logo.png" class="navbar-brand-img" alt="...">
          <br>
       ';
 
        echo '  <br>
        </a>
          <br>   <br>
      </div>
      <div class="navbar-inner">
  
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
  
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Inicio</span>
              </a>
            </li>
                  <li class="nav-item">
              <a class="nav-link active"  onclick="contenido(\''."usuario/login.php".'\')" href="#">
            <i class="fas fa-user-tie text-primary" ></i>';
                if (isset($_SESSION["usuario"])) {
       echo '<span class="nav-link-text">Perfil</span>';
}else{
echo '    <span class="nav-link-text">Login</span>';
}
            
              echo '</a>
            </li>
    <li class="nav-item">
              <a class="nav-link active" onclick="contenido(\''."carrito/vista.html".'\')">
               <i class="fas fa-cart-plus text-primary"></i>
                <span class="nav-link-text">Compra</span>
<p class="p-2"></p>
                <div onload="cargar_factura()" class="p-1 rounded-pill border border-primary "><div class="cantidad_producto"></div></div>
              
              </a>
            </li>';
                    if (isset($_SESSION["usuario"])) {
 
  
 echo '   <li class="nav-item">
              <a class="nav-link active" onclick="contenido(\''."carrito/seguimiento.html".'\')">
              <i class="far fa-list-alt text-info"></i>
                <span class="nav-link-text">Seguimiento de facturas</span>

              </a>
            </li>
          ';
 if ($_SESSION["rol_id"]>=9) {
   echo '   <li class="nav-item">
              <a class="nav-link active" onclick="contenido(\''."facturas/index.php?dato=banco".'\')">
              <i class="far fa-list-alt text-info"></i>
                <span class="nav-link-text">Bancos</span>

              </a>
            </li>
                   <li class="nav-item">
              <a class="nav-link active"  onclick="contenido(\''."usuario/vista.php".'\')" href="#">
            <i class="fas fa-user-tie text-primary" ></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            </li>';
 }

} 
echo '         <li class="nav-item">
<a class="nav-link active"  onclick="contenido(\''."usuario/desconectar.php".'\')" href="#">
<i class="fas fa-user-tie text-primary" ></i>
  <span class="nav-link-text">Desconectar</span>
</a>
</li>'; 
           echo '<li class="nav-item d-xl-none ">
          
              <div class=" nav-link sidenav-toggler sidenav-toggler-dark"  onclick="cerrarmenu()">
                <div class="sidenav-toggler-inner">
          <i class="fas fa-bars"></i>
             <span class="nav-link-text">Cerrar</span>
                </div>
              </div>
            </li>
            
          </ul>
         
          <hr class="my-3">
   
          
         
        </div>
      </div>
    </div>
  </nav>
   
<div class="main-content" id="panel">

        <nav class="navbar navbar-top navbar-expand navbar-dark   border-bottom">
                <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="navbar-nav align-items-center  ml-md-auto  ">
                                        <li class="nav-item d-none d-xl-none d-lg-none d-block ">

                                                <div class="pr-3 sidenav-toggler sidenav-toggler-dark"
                                                        data-action="sidenav-pin" data-target="#sidenav-main">
                                                        <div class="sidenav-toggler-inner ">
                                                             <i class="fas fa-bars"></i>
                                                        </div>
                                                </div>
                                        </li>
                                        <li class="nav-item d-sm-none">
                                                <a class="nav-link" href="#" data-action="search-show"
                                                        data-target="#navbar-search-main">
                                                        <i class="ni ni-zoom-split-in"></i>
                                                </a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav>';
     
  