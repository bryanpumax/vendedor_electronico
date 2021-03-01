<?php
  $ruta_head_inicio=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/head_inicio.php";
  $ruta_menu=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/menu.php";
 include "sgbd/interacion.php";
 include $ruta_head_inicio;
?>
<div class="container ">
        <div class="menu fixed-top" >
                <nav class="navbar navbar-expand-lg navbar-light mx-auto  " style="background-color: #e3f2fd;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <a class="navbar-brand" href="#"><img
                                                src="https://scontent.fuio1-1.fna.fbcdn.net/v/t1.0-9/152515761_715035362512527_71124112459781413_n.png?_nc_cat=103&ccb=3&_nc_sid=0debeb&_nc_eui2=AeHwXPvAU3auhwNzefeY_ShB3dL75_xvSHrd0vvn_G9Ieg-smFvDsPuEvFHj2hRRCgWDN2CC3mr_rLxFlOSJNqc9&_nc_ohc=fMk-lZe8IqEAX-4rv0R&_nc_ht=scontent.fuio1-1.fna&oh=dc30a7453f4f08e4f9d81212e4c0c88e&oe=605B3DFA "
                                                style="
    width: 4cm;
    flex-direction: row;
    border: antiquewhite;
" alt="" srcset=""></a>
                                <ul class="navbar-nav text-center mr-auto mt-2 mt-lg-0 ">
                                        <li class="nav-item active">
                                                <a class="nav-link" href="#carouselExampleCaptions">Inicio <span
                                                                class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="#objetivo">Objetivo</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link " href="#planes">Planes</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link " href="#contactos">Contactos</a>
                                        </li>
                                   
                                </ul>

                        </div>
                </nav>
        </div>

        <div class="row">
                <section>
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                                <img src="https://opoprisiones.com/portada/assets/images/mbr-2-1920x1280.jpg"
                                                        class="d-block w-100  img-fluid" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                        <div style="margin-bottom: 60%;">
                                                                <h4 class="text-white">APRUEBA CON NUESTRO METODO</h4>
                                                                <p>9000 PLAZOS
                                                                        <br>Cuerpo de Ayudantes de Instituciones
                                                                        Penitenciarias
                                                                </p>

                                                        </div>

                                                </div>
                                        </div>
                                        <div class="carousel-item">
                                                <img src="https://scontent.fuio1-1.fna.fbcdn.net/v/t1.0-9/153525309_715066662509397_56024633386499745_o.jpg?_nc_cat=108&ccb=3&_nc_sid=0debeb&_nc_eui2=AeHHf2XT-v8v6D6BQ6KK6Vy2ZTqZjfepqaVlOpmN96mppXdtExwMFtzep1E08MB7NMOH0w2z_CXzbydJdphXolWC&_nc_ohc=epQJtAi_HuwAX_F4Bvd&_nc_ht=scontent.fuio1-1.fna&oh=860d33bc618a8ec5bda1ce24ac859a02&oe=605D4F4F"
                                                        class="d-block w-100  img-fluid" alt="...">
                                                <div class="carousel-caption d-none d-md-block">

                                                </div>
                                        </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                </a>
                        </div>
                </section>
                <section id="objetivo" name="objetivo">
                        <div class="jumbotron">
                                <h1 class="display-3">Objetivo</h1>
                                <h2 class="display-4">¿Que es Opoprisiones.com?</h2>
                                <p class="lead">Una herramienta sencilla, pero muy completa, con un único objetivo,
                                        ayudarte a superar la oposición al Cuerpo de Ayudantes de Instituciones
                                        Penitenciarias.<br>

                                        La puedes usar perfectamente como herramienta principal de estudio, o como
                                        complemento a tu temario, academia, profesor particular, etc...<br>
                                        Ahora ya no tienes excusas...<br>
                                        sólo depende de TI conseguir la plaza en IIPP.</p>
                                <hr class="my-4">

                                <div class="accordion" id="accordionExample">
                                        <div class="card">
                                                <div class="card-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left"
                                                                        type="button" data-toggle="collapse"
                                                                        data-target="#collapseOne" aria-expanded="true"
                                                                        aria-controls="collapseOne">
                                                                        <div class="media"> <i
                                                                                        class="fas fa-coffee border border-info fa-5x mr-3"></i>
                                                                                <div class="media-body">
                                                                                        <h3 class="mt-4"> La única
                                                                                                aplicación que lo
                                                                                                incluye TODO</h3>
                                                                                </div>
                                                                        </div>

                                                                </button>
                                                        </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                        data-parent="#accordionExample">
                                                        <div class="card-body">
                                                                El Temario (BOE) de los 4 Bloques, que podrás leer desde
                                                                el móvil, tablet u ordenador cuando quieras y donde
                                                                quieras. Dentro de los temarios encontrarás debajo de
                                                                cada articulo sus preguntas oficiales que podrás
                                                                contestar.
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                        <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left collapsed"
                                                                        type="button" data-toggle="collapse"
                                                                        data-target="#collapseTwo" aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                        <div class="media"> <i
                                                                                        class="fas fa-list-alt border border-info fa-5x mr-3"></i>
                                                                                <div class="media-body">
                                                                                        <h3 class="mt-4"> Aprende
                                                                                                también haciendo Tests
                                                                                        </h3>
                                                                                </div>
                                                                        </div>

                                                                </button>
                                                        </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                        data-parent="#accordionExample">
                                                        <div class="card-body">
                                                                Todas las preguntas de los Tests, llevan debajo su
                                                                solución con el articulo literal del BOE, siempre son
                                                                preguntas aleatorias y no se repiten hasta después de
                                                                12h
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="card">
                                                <div class="card-header" id="headingThree">
                                                        <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left collapsed"
                                                                        type="button" data-toggle="collapse"
                                                                        data-target="#collapseThree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                        <div class="media"> <i
                                                                                        class="fas fa-diagnoses border border-info fa-5x mr-3"></i>
                                                                                <div class="media-body">
                                                                                        <h3 class="mt-4"> Supera esta
                                                                                                App y estarás muy cerca
                                                                                                de tu plaza</h3>
                                                                                </div>
                                                                        </div>
                                                                </button>
                                                        </h2>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                        data-parent="#accordionExample">
                                                        <div class="card-body">
                                                                Tendrás que superar tests:
                                                                <ul>
                                                                        <li>1º - De todos los temas. (50) </li>
                                                                        <li>2º - De cada Bloque. (4)</li>
                                                                        <li>3º - De la Legislación Fundamental (20)</li>
                                                                        <li>5 º- Exámenes oficiales (13)</li>
                                                                        <li>6 º- Del Temario completo</li>
                                                                </ul>

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>
                <section id="planes" name="planes">
                        <h1 class="display-4">Planes</h1><br>
                        <div class="card-group">

                                <div class="card">
                                        <img src="https://opoprisiones.com/portada/assets/images/mbr-2-696x464.jpg"
                                                class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h2 class="card-title">Suscripción Gratuita</h2>
                                                <p class="card-text">Opción con anuncios y publicidad, si te gusta te
                                                        recomendamos que después cojas la opción de 20€</p>
                                                <p class="card-text"><button>Registrase</button></p>
                                        </div>
                                </div>
                                <div class="card">
                                        <img src="https://opoprisiones.com/portada/assets/images/mbr-696x452.jpg"
                                                class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h2 class="card-title">Suscripción Mensual</h2>
                                                <p class="card-text">Opción recomendada para que puedas probar la APP y
                                                        ver si los temarios y test están a la altura de tus
                                                        expectativas.</p>
                                                <p class="card-text"><button>Registrase</button></p>
                                        </div>
                                </div>
                                <div class="card">
                                        <img src="https://opoprisiones.com/portada/assets/images/mbr-696x452.jpg"
                                                class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h2 class="card-title">Suscripción hasta el Examen</h2>
                                                <p class="card-text">Opción recomendada si ya has probado la App y te ha
                                                        gustado, para que no tengas que gastar nada más hasta el examen,
                                                        sea cuando sea.</p>
                                                <p class="card-text"><button>Registrase</button></p>
                                        </div>
                                </div>
                        </div>
                        <!-- planes -->
                </section>
                <section id="contactos" name="contactos">
                   <h1 class="display-4">Contactos</h1><br>
               

                        <ul class="nav justify-content-center">
  <li class="nav-item" onclick="contacto('wp')">
       <div class=" nav-link media" >
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="media-body">
                                                <h5 class="mt-0 mb-1">Whatsapp</h5>

                                        </div>
                                </div>
  </li>
  <li class="nav-item">
  <div class=" nav-link media " onclick="contacto('tg')">
                                        <i class="fab fa-telegram-plane"></i>
                                        <div class="media-body">
                                                <h5 class="mt-0 mb-1">Telegran</h5>
                                                @opoprisiones
                                        </div>
                                </div>
  </li>
  <li class="nav-item">
     <div class=" nav-link media">
                                        <i class="far fa-envelope-open"></i>
                                        <div class="media-body">
                                                <h5 class="mt-0 mb-1">Email</h5>
                                                registro@opoprisiones.com
                                        </div>
                                </div>
  </li>
 
</ul>
                </section>
               
        </div>


        <?php 
        $ruta_head_final=$_SERVER["DOCUMENT_ROOT"]."/app_php/vendedor_electronico/estructuracion_html/script.php";
        include $ruta_head_final;?>
</div>

<script>
$('.carousel').carousel({
        intervalo: 200
})

function contacto(te) {
        switch (te) {
                case 'wp':
                        window.open('https://api.whatsapp.com/send/?phone=34603048145');
                        break;
                case 'tg':
                 window.open('https://t.me/opoprisiones');
                
                        break;
        }
}
</script>