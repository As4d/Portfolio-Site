<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">
    
    <script src="js/themeSwitcher.js"></script>
</head>

<body>
    <header>
        <h1>About Me</h1>
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
        <section class="aboutme">
            <i><img src="img/personcircle.png" alt=""></i>
            <article id="aboutme">
                <figure>
                    <img src="img/Asad.jpg" alt="Picture of Asad">
                    <figcaption>Asad Ali Khan - 2022</figcaption>
                </figure>
                <p>My name is Asad Ali Khan and I am a Undergrad at QMUL. I have 1 year of experience
                    in the field of Web Technologies. I am passionate about Computer Science and I enjoy working on full
                    stack dev. In my free time, I like to go to the gym.</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Asad Ali Khan</p>
    </footer>

</body>

</html>