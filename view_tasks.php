<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "studyplanner";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM tasks ORDER BY due_date ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Study Planner</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #0e0e0e;
      color: #fff;
      padding: 20px;
    }
    h2 {
      text-align: center;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background: #6a11cb;
    }
    tr:nth-child(even) {
      background: #2a2a2a;
    }
    tr:hover {
      background: #3a3a3a;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #8a2be2;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2> My Study Planner</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Task</th>
        <th>Due Date</th>
        <th>Created At</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['subject']) ?></td>
          <td><?= htmlspecialchars($row['task']) ?></td>
          <td><?= $row['due_date'] ?></td>
          <td><?= $row['created_at'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p style="text-align:center; color:orange;">No study tasks added yet.</p>
  <?php endif; ?>

  <a href="index.html"> Add New Task</a>
</body>
</html>
<?php
$conn->close();
?>
