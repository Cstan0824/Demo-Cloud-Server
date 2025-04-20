<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $_ENV["ASSETS_URL"]; ?>/assets/css/style.css" rel="stylesheet">
<link rel="icon" type="image/png" href="<?php echo $_ENV["ASSETS_URL"]; ?>/assets/images/favicon.ico">
<script src="<?php echo $_ENV["ASSETS_URL"]; ?>/assets/js/script.js"></script>
</head>
<body class="container py-5">
  <h2 class="mb-4">My To-Do List</h2>
  <a href="create.php" class="btn btn-success mb-3">+ New Task</a>
<button id="toggleCompleted" class="btn btn-outline-primary mb-3 ms-2">Hide Completed</button>


  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Username</th>
        <th>Status</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $tasks = $conn->query("SELECT * FROM todo ORDER BY created_at DESC");
      while ($task = $tasks->fetch_assoc()):
    ?>
    
      <tr>
        <td><?= htmlspecialchars($task['title']) ?></td>
        <td><?= htmlspecialchars($task['description']) ?></td>
        <td><?= htmlspecialchars($task['username']) ?></td>
        <td>
          <tr data-status="<?= $task['status'] ?>" class="<?= $task['status'] ? 'completed-row' : '' ?>">

        </td>
        <td><?= $task['created_at'] ?></td>
        <td>
          <a href="edit.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
