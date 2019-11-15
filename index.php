<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <h2 style="text-align: center; padding-bottom: 30px;">Shreemoyee Inn Restaurant Menu</h2>
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
        <form action="save_task.php" method="POST">

          <div class="form-group">
          <div><h1 style="font-size:100%;">Item Status:</h1></div>
          <div><input type="radio" name="status" value="Available" checked> Available<br></div>
          <div> <input type="radio" name="status" value="Unavailable"> Unavailable<br></div>
          </div>

          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="₹ Price" autofocus required>
          </div>

          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Food Items Description e.g Masala Dosa"></textarea>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Item">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>₹ Price </th>
            <th>Food Items</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
