<?php

include('db.php');

if (isset($_POST['save_Jugadoresdefutbol'])) {
  $Equipo = $_POST['Equipo'];
  $Pais = $_POST['Pais'];
  $Nombre = $_POST['Nombre'];
  $Numerodeplayera = $_POST['Numerodeplayera'];
  $Valoracion = $_POST['Valoracion'];

  $query = "INSERT INTO Jugadoresdefutbol(Equipo, Pais, Nombre, Numerodeplayera, Valoracion) VALUES ('$Equipo', '$Pais', '$Nombre', '$Numerodeplayera', '$Valoracion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Jugadoresdefutbol Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>