<?php
include("db.php");
$Equipo = '';
$Pais= '';
$Nombre= '';
$Numerodeplayera= '';
$Valoracion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Jugadoresdefutbol WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Equipo = $row['Equipo'];
    $Pais = $row['Pais'];
    $Nombre = $row['Nombre'];
    $Numerodeplayera = $row['Numerodeplayera'];
    $Valoracion = $row['Valoracion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Equipo= $_POST['Equipo'];
  $Pais = $_POST['Pais'];
  $Nombre = $_POST['Nombre'];
  $Numerodeplayera = $_POST['Numerodeplayera'];
  $Valoracion = $_POST['Valoracion'];

  $query = "UPDATE Jugadoresdefutbol set Equipo = '$Equipo', Pais = '$Pais', Nombre = '$Nombre', Numerodeplayera= '$Numerodeplayera', Valoracion ='$Valoracion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Equipo Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Equipo" type="text" class="form-control" value="<?php echo $Equipo; ?>" placeholder="Update Equipo">
        </div>
        <div class="form-group">
        <textarea name="Pais" class="form-control" cols="30" rows="10"><?php echo $Pais;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Nombre" class="form-control" cols="30" rows="10"><?php echo $Nombre;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Numerodeplayera" class="form-control" cols="30" rows="10"><?php echo $Numerodeplayera;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Valoracion" class="form-control" cols="30" rows="10"><?php echo $Valoracion;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
