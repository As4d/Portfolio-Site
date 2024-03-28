<?php

$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbpwd = getenv("DATABASE_PASSWORD");
$dbname = getenv("DATABASE_NAME");
// Creates connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$postId = $_POST['post_id'];
$commenterName = $_SESSION['username'];
$comment = $_POST['comment'];

$sql = "INSERT INTO COMMENTS (post_id, username, comment) VALUES ('$postId', '$commenterName', '$comment')";

if ($conn->query($sql) === TRUE) {
    header("Location: viewBlog.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>