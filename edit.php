<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $status = $row['status'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $status = $_POST['status'];

  $query = "UPDATE task set title = '$title', description = '$description', status = '$status' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <h3 style="text-align: center; padding-bottom: 30px;">Update Restaurant Menu Item</h3>
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div><h1 style="font-size:100%;">Item Status:</h1></div>
        <div class="form-group">
          <input name="status" type="text" class="form-control" value="<?php echo $status; ?>" placeholder="Update Status">
        </div>

        <div><h1 style="font-size:100%;">Item Price ₹:</h1></div>
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Price">
        </div>

        <div><h1 style="font-size:100%;">Item Name:</h1></div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="3" placeholder="Food Items Description e.g Masala Dosa"><?php echo $description;?></textarea>
        </div>
        <button class="btn-success" name="update">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
