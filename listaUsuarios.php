<?php
    include "connect.php";
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

     <div class="container">
         <table class="table">
           <thead>
             <td>Primer Nombre</td>
             <td>Segundo Nombre</td>
             <td>Primer Apellido</td>
             <td>Segundo Apellidpo</td>
             <td>Tipo de documento</td>
             <td>Num. de documento</td>
             <td>País</td>
             <td>E-mail</td>
             <td>Estado</td>
           </thead>
           <tr>
             <?php
                  $sql=mysqli_query($conn,"SELECT * FROM usuario ");

                    while ($fila=$sql->fetch_array()) {
                    ?>
                   <td><?php echo $fila['primerNombre']?></td>
                   <td><?php echo $fila['segundoNombre']?></td>
                   <td><?php echo $fila['primerApellido']?></td>
                   <td><?php echo $fila['segundoApellido']?></td>
                   <td><?php echo $fila['tipo_documento']?></td>
                   <td><?php echo $fila['numDocumento']?></td>
                   <td><?php echo $fila['pais']?></td>
                   <td><?php echo $fila['correo']?></td>
                   <td><?php echo $fila['estado']?></td>

                   <td>
                    <form action="actualizar.php" method="POST">
                      <input type="text" name="id" value="<?php echo $fila['id_user']?>" hidden="true">
                      <input type="submit" name="" value="Actualizar" class="btn btn-primary">
                    </form>
                  </td>

                    <?php
                    
                  }
                ?>
           </tr>
         </table>
     </div>


</body>
</html>