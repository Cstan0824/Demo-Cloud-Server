<?php include 'db.php';
if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $username = $_POST['username'];
    $sql = "CREATE TABLE IF NOT EXISTS todo(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, title VARCHAR(30) NOT NULL, description TEXT NOT NULL, username VARCHAR(30) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
    $conn->query($sql);
    $conn->query("INSERT INTO todo (title, description, username) VALUES ('$title', '$desc', '$username')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="<?php echo $_ENV["ASSETS_URL"]; ?>/assets/images/favicon.ico">

</head>
<body class="container py-5">
  <h2 class="mb-4">Add New Task</h2>
  <form method="POST" class="w-50">
    <div class="mb-3">
      <label>Title</label>
      <input name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Username</label>
      <input name="username" class="form-control" required>
    </div>
    <button class="btn btn-primary">Create</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
