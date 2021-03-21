<?php
   
 echo '<div class="row">
        <h1 class="col btn btn-primary inicio_steps top_step_1" onclick="dezplazar(1)">Datos Personales</h1>
        <h1 class="col btn btn-primary inicio_steps disabled top_step_2" onclick="dezplazar(2)">Acceso al sistema</h1>
        <h1 class="col btn btn-primary inicio_steps disabled top_step_3" onclick="dezplazar(3)">Factura</h1>
</div>
<form class="was-validated"  novalidate id="formulario_cliente" name="formulario_cliente"  >
        <div class="row">';
       
               echo ' <div class="mid_step_1 steps">


                        <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Cedula </label>
                                        <input type="text" class="form-control" onkeypress="return numeros(event);" id="cedula" name="cedula"   required>
                                        <div class="invalid-feedback">
                                                Pon tu cedula
                                        </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Nombre</label>
                                        <input type="text" class="form-control" readonly id="nombre" name="nombre" onkeypress="return letra(event);"   
                                                required>
                                        <div class="invalid-feedback">
                                                Pon tu nombre
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Apellido</label>
                                        <input type="text" class="form-control" readonly id="apellido" name="apellido"  onkeypress="return letra(event);"   
                                                required>
                                        <div class="invalid-feedback">
                                                Pon tu apellido
                                        </div>
                                </div>
                        </div>
                        <div class="form-row ">
                                <div class="col-md-6 mb-3 d-none">
                                        <label for="validationCustom03">Pais</label>
                                        <input type="text" class="form-control" readonly id="validationCustom03"
                                                required>
                                        <div class="invalid-feedback">
                                                Please provide a valid city.
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Provincia de donde vives</label>
                                        <select class="custom-select" readonly id="provincia" name="provincia" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please select a valid state.
                                        </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Canton</label>
                                        <select class="custom-select" readonly id="canton" name="canton" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please provide a valid zip.
                                        </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Parroquia</label>
                                        <select class="custom-select" readonly id="parroquia" name="parroquia" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please provide a valid zip.
                                        </div>
                                </div>
                        </div>
                        <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Telefono</label>
                                        <input type="text" class="form-control" readonly id="telefono" name="telefono"    onkeypress="return numeros(event);" required>
                                        <div class="invalid-feedback iphone">
                                                Pon tu telefono
                                        </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Correo electronico @</label>
                                        <input type="email" class="form-control" readonly id="correo" name="correo"   required>
                                        <div class="invalid-feedback">
                                                Pon tu correo
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Direccion donde vives</label>
                                        <input type="text" class="form-control" readonly id="direccion" name="direccion"  required>
                                        <div class="invalid-feedback">
                                                Pon tu direccion
                                        </div>
                                </div>
                        </div>


                </div>
                <div class="steps mid_step_2">
                        <div class="form-row">
                                <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Usuario</label>
                                        <input type="text" class="form-control" readonly id="usuario" name="usuario"  required>
                                        <div class="invalid-feedback">
                                                Pon tu usuario
                                        </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Contraseña</label>
                                        <input type="password" class="form-control" readonly id="passwords" name="passwords"  required>
                                        <div class="invalid-feedback">
                                                Pon tu contraseña
                                        </div>
                                </div>

                        </div>
                </div>
                <div class="steps mid_step_3">
                        <div class="row">
                                <div class="col-sm-6">
                                        <div class="card">
                                                <div class="card-body">
                                                        <h5 class="card-title">Pago</h5>
                                                        <p class="card-text"> <select class="form-control is-invalid"
                                                                        name="tipo_pago" id="tipo_pago">
                                                                        <option   value="">Seleccione tipo de  pago</option>
                                                                        <option value="1">Efectivo</option>
                                                                        <option value="2">Pinchicha</option>
                                                                        <option value="3">Bolivariano</option>
                                                                        <option value="4">Cooperativa Jep</option>

                                                                </select></p>

                                                </div>
                                        </div>
                                </div>
                             <div class="col-sm-6">
                                        <div class="card ">
                                                <div class="card-body">
                                                        <div class="contenido-pago"></div>
                                                </div>
                                        </div>
                                </div>
                               
                        </div>
                         <div class="row">
                           <div class="col-sm-6">
                                        <div class="card">
                                                <div class="card-body">
                                                        <h5 class="card-title">Recogeras los productos </h5>
                                                        <p class="card-text"> <select class="form-control is-invalid"
                                                                        name="transporte" id="transporte">
                                                                        <option    value="">Seleccione </option>
                                                                        <option value="Ven a recoger a nuestro Local">Local</option>
                                                                        <option value="Ya te enviamos hacia tu Casa">En tu hogar</option>
                                                                </select></p>
                                                </div>
                                        </div>
                                </div>
                           <div class="col-sm-6">
                                        <div class="card">
                                                <div class="card-body">
                                                        <div class="contenido-factura"></div>
                                                </div>
                                        </div>
                                </div>
                                    
                                </div>
                </div>';
                echo '
        </div>
        <div class="row text-right ">
                <div class="offset-md-8">
                        <button type="button" class="btn btn-info boton-izquierdo"
                                onclick="menos_steps()">Anterio</button>
                        <button type="button" class=" btn btn-info boton-derecho">Siguiente
                        </button>
                </div>

                <input type="text" name="numero_pg" id="numero_pg" value="1">
        </div>
</form>
 
<script src="https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/formulario.js"></script>
';