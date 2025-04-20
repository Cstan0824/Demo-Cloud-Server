<?php include 'db.php';
$id = $_GET['id'];
$task = $conn->query("SELECT * FROM todo WHERE id=$id")->fetch_assoc();

if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $username = $_POST['username'];
    $status = isset($_POST['status']) ? 1 : 0;
    $conn->query("UPDATE todo SET title='$title', description='$desc', username='$username', status=$status WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="<?php echo $_ENV["ASSETS_URL"]; ?>/assets/images/favicon.ico">

</head>
<body class="container py-5">
  <h2 class="mb-4">Edit Task</h2>
  <form method="POST" class="w-50">
    <div class="mb-3">
      <label>Title</label>
      <input name="title" class="form-control" value="<?= $task['title'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" required><?= $task['description'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Username</label>
      <input name="username" class="form-control" value="<?= $task['username'] ?>" required>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="status" value="1" <?= $task['status'] ? 'checked' : '' ?>>
      <label class="form-check-label">Mark as done</label>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
