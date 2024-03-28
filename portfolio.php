<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">
    <script src="js/themeSwitcher.js"></script>
</head>

<body>
    <header>
        <h1>Portfolio</h1>
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
        <section class="project1">
            <i><img src="img/builder.png" alt=""></i>
            <header>
                <h2>Hades</h2>
            </header>
            <ul>
                <li>
                    <figure>
                        <img src="img/Hades.png">
                        <img src="img/Hades1.png">
                        <figcaption>
                            <header>
                                <h3>Hades Anti virus</h3>
                            </header>
                            <p>This is a python based anti virus project i worked on for my A level coursework.</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Asad Ali Khan</p>
    </footer>
</body>

</html>