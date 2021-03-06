<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_Jugadoresdefutbol.php" method="POST">
          <div class="form-group">
            <input type="text" name="Equipo" class="form-control" placeholder="Equipo" autofocus>
          </div>
          <div class="form-group">
            <textarea name="Pais" rows="2" class="form-control" placeholder="Pais"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Nombre" rows="2" class="form-control" placeholder="Nombre"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Numerodeplayera" rows="2" class="form-control" placeholder="Numero de playera"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Valoracion" rows="2" class="form-control" placeholder="Valoracion"></textarea>
          </div>
          <input type="submit" name="save_Jugadoresdefutbol" class="btn btn-success btn-block" value="Save Jugadores de futbol">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Equipo</th>
            <th>Pais</th>
            <th>Nombre</th>
            <th>Numero de playera</th>
            <th>Valoracion</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Jugadoresdefutbol";
          $result_Jugadoresdefutbol = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_Jugadoresdefutbol)) { ?>
          <tr>
            <td><?php echo $row['Equipo']; ?></td>
            <td><?php echo $row['Pais']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Numerodeplayera']; ?></td>
            <td><?php echo $row['Valoracion']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_Jugadoresdefutbol.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
