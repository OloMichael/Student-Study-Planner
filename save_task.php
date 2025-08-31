<?php

$servername = "localhost";
$username   = "root";   
$password   = "";       
$dbname     = "studyplanner";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subject  = $_POST['subject'];
$task     = $_POST['task'];
$due_date = $_POST['due_date'];

$sql = "INSERT INTO tasks (subject, task, due_date) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $subject, $task, $due_date);

if ($stmt->execute()) {
    echo "<h2 style='color:green; text-align:center;'>Task Added Successfully </h2>";
    echo "<p style='text-align:center;'><a href='index.html'>Add Another Task</a></p>";
    echo "<p style='text-align:center;'><a href='view_tasks.php'>View Tasks</a></p>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
