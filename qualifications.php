<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualifications</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dark.css" id="pageStyle">
    
    <script src="js/themeSwitcher.js"></script>
</head>

<body>
    <header>
        <h1>Qualifications</h1>
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
        <section class="skills">
            <i><img src="img/science.png" alt=""></i>
            <header>
                <h2>Skills</h2>
            </header>
            <header>
                <h3>Web Tech</h2>
            </header>
            <ul>
                <li>HTML</li>
                <li>CSS</li>
                <li>PHP</li>
                <li>SQL</li>
                <li>JavaScript</li>
                <li>Bootstrap</li>
            </ul>
            <header>
                <h3>Programming Languages</h2>
            </header>
            <ul>
                <li>Python</li>
                <li>Java</li>
                <li>C#</li>
                <li>JavaScript</li>
            </ul>
            <header>
                <h3>Other</h2>
            </header>
            <ul>
                <li>Git</li>
                <li>Kali Linux</li>
                <li>.NET</li>
            </ul>
        </section>

        <section class="education">
            <i><img src="img/school.png" alt=""></i>
            <header>
                <h2>Education and Qualifications</h2>
            </header>
            <article>
                <h3>Computer Science, 2026 - QMUL</h3>
                <p>Currently Year 1</p>
            </article>
            <article>
                <h3>A Levels, 2022 - Brampton Manor Academy</h3>
                <p>A*AA Maths Physics Computer Science</p>
            </article>
            <article>
                <h3>GCSE, 2020 - Brampton Manor Academy</h3>
                <p>7.4 GPA across 11 GCSES</p>
            </article>
        </section>

        <section class="experience">
            <i><img src="img/work.png" alt=""></i>
            <header>
                <h2>Experience</h2>
            </header>
            <article>
                <h3>Student Trainee, Immediate Media Co, 2021, 1 Week</h3>
                <p>I learnt about HTML,
                    Bootstrap and Yarn creating a python script that scans packages for vulnerabilities and outputs them
                    in a stylised web page. I attained insight on using
                    Linux and became more comfortable with bash terminals and shells</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Asad Ali Khan</p>
    </footer>

</body>

</html>