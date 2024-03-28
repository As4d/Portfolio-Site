<?php
session_start();

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

$sql = "SELECT * FROM BLOG";
$result = $conn->query($sql);

$posts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

usort($posts, function ($a, $b) {
    return strtotime($b['post_date']) - strtotime($a['post_date']);
});

$months = array();
foreach ($posts as $post) {
    $date = new DateTime($post['post_date']);
    $month = $date->format('F Y');
    if (!in_array($month, $months)) {
        array_push($months, $month);
    }
}

if (isset($_GET['month']) && $_GET['month'] != "") {
    $selectedMonth = $_GET['month'];
    $filteredPosts = array_filter($posts, function ($post) use ($selectedMonth) {
        $date = new DateTime($post['post_date']);
        $month = $date->format('F Y');
        return $month == $selectedMonth;
    });
    $posts = $filteredPosts;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">
    <script src="js/themeSwitcher.js"></script>
</head>

<body>
    <header>
        <h1>Blog</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">about me</a></li>
            <li><a href="viewBlog.php">blog</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="qualifications.php">qualifications</a></li>
            <li><a href="portfolio.php">portfolio</a></li>
        </ul>
        <?php if (isset($_SESSION['username'])): ?>
            <p><a href="logout.php">Logout</a></p>
        <?php else: ?>
            <p><a href="login.php">Login</a></p>
        <?php endif; ?>
    </nav>
    <nav>
        <label class="toggle-switch">
            <input type="checkbox" onclick="themeSwitch()" id="themeSlider">
            <span class="slider"></span>
        </label>
    </nav>
    <nav>
        <?php if (isset($_SESSION['username'])): ?>
            <p><a href="addEntry.php">Add Post</a></p>
        <?php endif; ?>
    </nav>

    <div class="blog-container">
        <?php
        echo '<form method="GET">';
        echo '<select name="month" id="month">';
        echo '<option value="">All months</option>';
        foreach ($months as $month) {
            echo '<option value="' . $month . '"';
            if (isset($_GET["month"]) && $_GET["month"] == $month) {
                echo "selected";
            }
            echo '>' . $month . '</option>';
        }
        echo '</select>';
        echo '<button type="submit">Filter</button>';
        echo '</form>';
        ?>
        <?php // Output data of each row
        foreach ($posts as $post) {
            echo '<div class="blog-entry">';
            echo '<div class="blog-date">' . $post["post_date"] . '</div>';
            echo '<div class="blog-user">' . $post["username"] . '</div>';
            echo '<div class="blog-title">' . $post["title"] . '</div>';
            echo '<div class="blog-post">' . $post["content"] . '</div>';

            if (isset($_SESSION['username']) && $_SESSION['admin']) {
                echo '<p><a href="delEntry.php?post_id=' . $post["id"] . '">Delete</a><p>';
            }

            // Display comments for this post
            $post_id = $post['id'];
            $sql_comments = "SELECT * FROM COMMENTS WHERE post_id=$post_id ORDER BY comment_date ASC";
            $result_comments = $conn->query($sql_comments);


            if ($result_comments->num_rows > 0) {

                echo '<div class="comment-block">';
                echo '<h3>Comments:</h3>';
                while ($row_comment = $result_comments->fetch_assoc()) {
                    echo '<div class="comment-container">';
                    echo '<div class="comment-date">' . $row_comment["comment_date"] . '</div>';
                    echo '<div class="comment-user">' . $row_comment["username"] . '</div>';
                    echo '<div class="comment-content">' . $row_comment["comment"] . '</div>';

                    // Allow administrators to delete comments
                    if (isset($_SESSION['username']) && $_SESSION['admin']) {
                        echo '<p><a href="delComment.php?comment_id=' . $row_comment["id"] . '">Delete</a><p>';
                    }

                    echo '</div>';
                }
            }

            // Allow logged in users to add comments
            if (isset($_SESSION['username'])) {
                echo '<form method="POST" action="addComment.php">';
                echo '<input type="hidden" name="post_id" value="' . $post["id"] . '">';
                echo '<textarea name="comment" id="comment" placeholder="Add a comment"></textarea>';
                echo '<button type="submit" name="submit_comment">Submit</button>';
                echo '</form>';
            } else {
                echo '<p><a href="login.php">Log in</a> to add comments.</p>';
            }


            echo '</div>';
            echo '<hr>';
        }

        ?>
    </div>

    </div>
</body>

</html>