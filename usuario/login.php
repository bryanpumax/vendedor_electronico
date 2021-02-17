<?php 
session_start();
 include "../sgbd/interacion.php";
 
 
 if (  !isset($_SESSION["cedula"]) ) {
  echo '<form >
  <div class="form-group">
    <label for="Usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario"  >
   
  </div>
  <div class="form-group">
    <label for="contrase">Contraseña</label>
    <input type="password" class="form-control" id="contrase" name="contrase">
  </div>
  
  <button type="button" onclick="login()" class="btn btn-primary">Ingresar</button>
  <button type="button" onclick="registrar()" class="btn btn-primary">Registrar</button>
  <button type="button" onclick="olvidar()" class="btn btn-primary">Olvidaste contraseña o usuario</button>
</form>
<script src="https://lab-mrtecks.com/app_php/vendedor_electronico/usuario/usuario.js"></script>
';
   
} else{ 
     $página_inicio = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/app_php/vendedor_electronico/usuario/perfil.php');
echo $página_inicio;  
 
}

?>


