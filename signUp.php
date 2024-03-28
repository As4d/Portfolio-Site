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

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO USERS (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
        header("Location: addEntry.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">

    <script src="js/signUp.js"></script>
    <script src="js/themeSwitcher.js"></script>
</head>

<body>
    <header>
        <h1>Sign Up</h1>
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
        <section class="login">
            <form action="signUp.php" method="post" onsubmit="checkForm(event)">
                <div>
                    <i><img src="img/person.png" alt=""></i>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div>
                    <i><img src="img/person.png" alt=""></i>
                    <input type="text" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div>
                    <i><img src="img/key.png" alt=""></i>
                    <input type="password" id="password" name="password" placeholder="Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="Must contain at least one number, one uppercase letter, one lowercase letter, and be at least 6 characters long"
                        required>
                </div>
                <div>
                    <i><img src="img/key.png" alt=""></i>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="Must contain at least one number, one uppercase letter, one lowercase letter, and be at least 6 characters long"
                        required>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already Have an account? <a href="login.php">Login Here!</a></p>

        </section>
    </main>

    <footer>
        <p>&copy; 2023 Asad Ali Khan</p>
    </footer>
</body>

</html>