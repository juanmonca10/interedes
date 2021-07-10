<?php
include'connect.php';

$nomUno=$_POST['PrimerNombre'];
$nomDos=$_POST['SegundoNombre'];
$apeUno=$_POST['PrimerApellido'];
$apeDos=$_POST['SegundoApellido'];
$pais=$_POST['pais'];
$numDoc=$_POST['numId'];
$estado=$_POST['estado'];
$fechaIngreso=$_POST['fechaIngreso'];


$correo=$nomUno.'.'.$apeUno;
$email= strtolower($correo);

if($pais = 1){

  $sql=mysqli_query($conn,"SELECT * FROM correos WHERE correo = '$email' ");
  
  if($sql){
    
    while ($row=$sql->fetch_array()) {
     
     $dato=$row['correo'];
     
     if ($dato = $email) {
       
       $correo=$dato.'1'.'@intereses.com.co';

     }else {

       $correo=$dato.'@intereses.com.co';
    
     
     
      $consulta=mysqli_query($conn,"INSERT INTO usuario(primerNombre, 
                                   segundoNombre, 
                                   primerApellido, 
                                   segundoApellido, 
                                   pais, 
                                   numDocumento,
                                   correo,
                                   estado, 
                                   fechaIngreso ) 
                                   VALUES ('$nomUno',
                                           '$nomDos',
                                           '$apeUno', 
                                           '$apeDos',
                                           '$pais',
                                           '$numDoc',
                                           '$correo',
                                           '$estado',
                                           '$fechaIngreso');");


      $consulta1=mysqli_query($conn,"INSERT INTO correos(correo) VALUES ('$correo');");

      }
      
    }
  }
  
}

header ("Location:index.php");


?>