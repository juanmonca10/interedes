<?php
    include "connect.php";
      $id_user=$_POST['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
   <nav class="navbar navbar-light bg-dark">
  
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo_interedes.jpg" alt="" width="50" height="30" class="d-inline-block align-text-top">
      <strong><span>Interedes</span></strong>
    </a>
  </div>

</nav>
<br>

  <?php



                  $sql=mysqli_query($conn,"SELECT * FROM usuario where id_user = '$id_user'");

                  if($sql){
                    while ($fila=$sql->fetch_array()) {
                    ?>


     <div class="container">
          <div id="borde">
             <form action="confirmarDatos.php" method="POST">
               <input type="text" name="PrimerNombre"  class="form-control " value="<?php echo $fila['primerNombre'] ?>" onkeypress="return SoloLetras(event);" placeholder="Primer Nombre"  maxlength="20" minlength="3" required="true">
              <br>
              <input type="text" name="SegundoNombre"  class="form-control " value="<?php echo $fila['segundoNombre'] ?>" onkeypress="return SoloLetrasYcaracteres(event);" placeholder="Segundo Nombre" maxlength="20" >
              <br>
               <input type="text" name="PrimerApellido"  class="form-control " value="<?php echo $fila['primerApellido'] ?>" onkeypress="return SoloLetrasYcaracteres(event);" placeholder="Primer Apellido" maxlength="20" minlength="3" r.phpequired="true">
              <br>
              <input type="text" name="SegundoApellido"  class="form-control " value="<?php echo $fila['segundoApellido'] ?>" onkeypress="return SoloLetrasYcaracteres(event);" placeholder="Segundo Apellido" maxlength="50" minlength="3" required="true">
              <br>
              <select class="form-control" required="true" name="pais">
                <option value="0">Seleccione su país</option>
                <?php
                  $sql=mysqli_query($conn,"SELECT * FROM pais ");

                  if($sql){
                    while ($fila=$sql->fetch_array()) {
                    ?>
                    <option value="<?php echo $fila['id_pais'] ?>"><?php echo $fila['nombre_pais'] ?></option>
                    <?php
                    }
                  }
                ?>
                
              </select>
              <br>
              <select class="form-control" required="true" name="documento">
                <option value="0">Seleccione el tipo de documento de identidad</option>
                <?php
                  $sql=mysqli_query($conn,"SELECT * FROM tipo_documento ");

                  if($sql){
                    while ($fila=$sql->fetch_array()) {
                    ?>
                    <option value="<?php echo $fila['id_documento'] ?>"><?php echo $fila['numero_documento'] ?></option>
                    <?php
                    }
                  }
                ?>

              </select>
              <br>

               <input type="text" name="numId" class="form-control" placeholder="Número de Identidad" onkeypress="return TipoId(event)" maxlength="20" required="true">
               <br>

               <select class="form-control">
                 <option value="0">Seleccione el area donde trabajrá</option>
                  <?php
                  $sql=mysqli_query($conn,"SELECT * FROM area_contratada ");

                  if($sql){
                    while ($fila=$sql->fetch_array()) {
                    ?>
                    <option value="<?php echo $fila['id_area'] ?>"><?php echo $fila['nombre_area'] ?></option>
                    <?php
                    }
                  }
                ?>
                
               </select>
               <br>
               <label>Fecha de Ingreso</label>
               <input type="date" name="fechaIngreso" class="form-control" placeholder="Ingrese la fecha de ingreso a laborar.">

               <input type="" name="estado" value="Activo" class="form-control" hidden="true">
               <br>

              <div  style="text-align: center;">
                <input type="submit" name="" value="Siguiente" class="btn btn-primary">
              <br>
              </div>

              <?php
                }
              }
              ?>


        </form>
          </div>
     </div>

<script>
  function SoloLetras(e){

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras="ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    especiales = [8,13];
    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
   }


   if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert("Por favor no ingrese letras minusculas, números o caracteres especiales como la Ñ o tildes.");
    return false;
   }
 }

 function SoloLetrasYcaracteres(e){

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras="ABCDEFGHIJKLMNOPQRSTUVWXYZ ";

    especiales = [8,13];
    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
   }


   if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert("Por favor no ingrese letras minusculas, números o caracteres especiales como la Ñ o tildes.");
    return false;
   }
 }

 function TipoId(e){

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstvwxyz0123456789- ";

    especiales = [8,13];
    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
   }


   if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert("El tipo de caracter que acaba de ingresar no es valido.");
    return false;
   }
 }

</script>
</body>
</html>