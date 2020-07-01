<?php
include 'modificar.php';
$reg= buscar_dni();
$dni=$reg['dni'];
$nombre=$reg["nombre"];
$apellido=$reg["apellido"];
$correo=$reg["correo"];
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h2>Modificar Alumno</h2>
     <p>Ingrese los nuevos datos del alumno.</p>
     <form action="" method="post">
       <input type="text" name="nombre" placeholder="Nombre" value="<?php echo "$nombre"; ?>">
       <input type="number" name="dni" placeholder="DNI" value="<?php echo "$dni"; ?>">
       <input type="text" name="apellido" placeholder="Apellido" value="<?php echo "$apellido"; ?>">
       <input type="text" name="correo" placeholder="Correo" value="<?php echo "$correo"; ?>">
       <input type="submit" name="guardar" value="Guardar Cambios">
       <button type="submit" name="Cancelar" formaction="buscar_dni.html">Cancelar</button>
     </form>
     <?php
     if(array_key_exists('guardar',$_POST)){
        guardar_cambios();
     }
      ?>
   </body>
 </html>
