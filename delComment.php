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

if ($_SESSION['admin'] == 0) {
    header('Location: viewBlog.php');
    exit;
}

$comment_id = $_GET['comment_id'];

$sql = "DELETE FROM COMMENTS WHERE id='$comment_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: viewBlog.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>