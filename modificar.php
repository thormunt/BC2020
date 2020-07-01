<?php
return;

function buscar_dni(){
  // 1) Conexion
  if ($conexion = mysqli_connect("127.0.0.1", "root", "")){
    mysqli_select_db($conexion, "detodounpocosub");
    // 2) Almacenamos los datos del envío POST
    $dni1=$_POST['dni1'];

    if ($q= "SELECT * FROM sorteosub WHERE dni='$dni1'"){
      $reg=mysqli_query ($conexion, $q);
      $nombre_reg=mysqli_fetch_array($reg);
      if ($nombre_reg['dni']==$dni1) {
        return $nombre_reg;
      }else {
        header('Location: dnmal.html');
        DIE("el dni ingresado no existe");
      }
      } else {
      echo "<p> MySQL no conoce ese usuario y password</p>";
    }
  } else {
    echo "ERROR!";
  }
}

function guardar_cambios(){
  // 1) Conexion
  if ($conexion = mysqli_connect("127.0.0.1", "root", "")) {
    mysqli_select_db($conexion, "detodounpocosub");
    // 2) Almacenamos los datos del envío POST

    $nombre=$_POST['nombre'];
    $dni=$_POST['dni'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    // 3) Preparar la orden SQL
    $consulta = "UPDATE sorteosub SET  nombre='$nombre', apellido='$apellido', dni='$dni', correo='$correo' WHERE dni=$dni";
    // 4) Ejecutar la orden y ingresamos datos
    mysqli_query($conexion, $consulta);
    echo "se a modificado correctamente";
    return;
  } else {
    echo "ERROR!";
  }
}

?>
