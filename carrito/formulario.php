<div class="row">
        <h1 class="col btn btn-primary inicio_steps top_step_1" onclick="dezplazar(1)">Datos Personales</h1>
        <h1 class="col btn btn-primary inicio_steps disabled top_step_2" onclick="dezplazar(2)">Acceso al sistema</h1>
        <h1 class="col btn btn-primary inicio_steps disabled top_step_3" onclick="dezplazar(3)">Factura</h1>
</div>
<form class="needs-validation" action="https://lab-mrtecks.com/app_php/vendedor_electronico/carrito/recibir.php" method="post"
        novalidate>
        <div class="row">
                <div class="mid_step_1 steps">


                        <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Cedula</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                                        <div class="invalid-feedback">
                                                Pon tu cedula
                                        </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        <div class="invalid-feedback">
                                                Pon tu nombre
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                        <div class="invalid-feedback">
                                                Pon tu apellido
                                        </div>
                                </div>
                        </div>
                        <div class="form-row ">
                                <div class="col-md-6 mb-3 d-none">
                                        <label for="validationCustom03">Pais</label>
                                        <input type="text" class="form-control" id="validationCustom03" required>s
                                        <div class="invalid-feedback">
                                                Please provide a valid city.
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Provincia</label>
                                        <select class="custom-select" id="provincia" name="provincia" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please select a valid state.
                                        </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Canton</label>
                                        <select class="custom-select" id="canton" name="canton" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please provide a valid zip.
                                        </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">Parroquia</label>
                                        <select class="custom-select" id="parroquia" name="parroquia" required>

                                        </select>
                                        <div class="invalid-feedback">
                                                Please provide a valid zip.
                                        </div>
                                </div>
                        </div>
                        <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                        <div class="invalid-feedback">
                                                Pon tu telefono
                                        </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Correo electronico @</label>
                                        <input type="text" class="form-control" id="correo" name="correo" required>
                                        <div class="invalid-feedback">
                                                Pon tu correo
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Direccion donde vives</label>
                                        <input type="text" class="form-control" id="Direccion" name="Direccion"
                                                required>
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
                                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                                        <div class="invalid-feedback">
                                                Pon tu usuario
                                        </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Contraseña</label>
                                        <input type="text" class="form-control" id="passwords" name="passwords"
                                                required>
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
                                                        <p class="card-text"> <select class="form-control" name="tipo_pago" id="tipo_pago">
                                                                        <option value="efectivo">Efectivo</option>
                                                                        <option value="Pinchicha">Pinchicha</option>
                                                                        <option value="bolivariano">Bolivariano</option>
                                                                        <option value="jep">Cooperativa Jep</option>

                                                                </select></p>

                                                </div>
                                        </div>
                                </div>
                                <div class="col-sm-6">
                                        <div class="card">
                                                <div class="card-body">
                                                <div class="contenido-factura"></div>
                                                      <!--   <h5 class="card-title">Factura</h5>
                                                        <p class="card-text">
                                                        <div class="row">
                                                                <div class="col">SubTotal</div>
                                                                <div class="col">$<div class="subtotal"></div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col">Iva</div>
                                                                <div class="col">$<div class="iva"></div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col">Total</div>
                                                                <div class="col">$<div class="total"></div>
                                                                </div>
                                                        </div>
                                                        </p> -->

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="row text-right ">
                <div class="offset-md-8">
                        <button type="button" class="btn btn-info boton-izquierdo"
                                onclick="menos_steps()">Anterio</button>
                        <button type="button" class=" btn btn-info boton-derecho" onclick="mas_steps()">Siguiente
                        </button>
                </div>

                <input type="text" name="numero_pg" id="numero_pg" value="1">
        </div>
</form>
<script src="http://localhost/vendedor_electronico/carrito/formulario.js"></script>