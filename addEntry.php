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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare('INSERT INTO BLOG (username, title, content) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $_SESSION['username'], $title, $content);

    if ($stmt->execute()) {
        header('Location: viewBlog.php');
        exit;
    } else {
        echo 'Error adding blog post.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">
    <script src="js/themeSwitcher.js"></script>
    <script src="js/addEntry.js"></script>
</head>

<body>
    <header>
        <h1>Add Blog</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">about me</a></li>
            <li><a href="viewBlog.php">blog</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="qualifications.php">qualifications</a></li>
            <li><a href="portfolio.php">portfolio</a></li>
        </ul>
    </nav>
    <nav>
        <label class="toggle-switch">
            <input type="checkbox" onclick="themeSwitch()" id="themeSlider">
            <span class="slider"></span>
        </label>
    </nav>
    <main>
        <section class="addpost">
            <form method="POST" onsubmit="validateForm(event)">
                <div>
                    <input type="text" id="title" name="title" placeholder="Enter title here">
                </div>
                <div>
                    <textarea id="content" name="content" placeholder="Enter content here"></textarea>
                </div>
                <button type="submit">Post</button>
                <button type="button" onclick="clearFields();">Clear</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Asad Ali Khan</p>
    </footer>
</body>

</html>