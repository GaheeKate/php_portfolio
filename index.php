<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>

<!doctype html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gahee Choi | Portfolio</title>
    <link rel="icon" type="image/x-icon" href="/img/GaheeChoiAvatar.jpeg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <meta content="Gahee Kate Choi's portfolio" name="description">
    <meta content="Gahee Choi" name="author">


    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/b88d076b90.js" crossorigin="anonymous"></script>

</head>


<body id="page-top">

    <header id="header">
        <div class="sidenav" id="nav">

            <div class="hidden">
                <img src="img/GaheeChoiAvatar.jpeg" alt="Pic of Gahee Choi" class="header_img__avartar">
                <h1 class="nav_title"><a href="http://katekate.infinityfreeapp.com/php-cms-main/#home">Gahee Choi</a></h1>
            </div>

            <!-- Navigation-->
            <nav id="navbar">
                <ul>
                    <li><a href="#home" class="">
                            <span>Home</span></a></li>
                    <li><a href=" #about" class=""> <span>About</span></a>
                    <li><a href=" #skills" class=""> <span>Skills</span></a>
                    <li><a href=" #portfolio" class=""> <span>Portfolio</span></a>
                    <li><a href=" #resume" class=""> <span>Resume</span></a>
                    <li><a href=" #contact" class=""> <span>Contact</span></a>
                    </li>
                </ul>
            </nav>

        </div>
    </header>


    <!-- HOME-->
    <section class="home" id="home">
        <div class="home_container">
            <h1 id="name">
                Gahee Choi
            </h1>
            <div class="wrapper">
                <div class="static-txt">I'm</div>
                <ul class="dynamic-txts">
                    <li><span>Web developer</span></li>
                    <li><span>Team player</span></li>
                    <li><span>Lifelong learner</span></li>
                    <li><span>Designer</span></li>
                </ul>
            </div>
            <div>
                ⬥ Etobicoke, Ontario ⬥ gaheekate@gmail.com
            </div>

            <div class="I-wrapper">
                <a href="https://github.com/GaheeKate" class="github"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/gahee-choi-855645b8/" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                <a href="mailto:gaheekate@gmail.com" class="email"><i class="fa-solid fa-envelope"></i></a>

            </div>
        </div>
    </section>

    <!-- Page content -->
    <main class="main">

        <!-- About-->
        <section class="about" id="about">
            <div class="container">
                <h2 class="section_title">About</h2>

                <div class="row">
                    <div class="col" id="center">
                        <img class="about_pic" src="img/GaheeChoiAvatar.jpeg" alt="Pic of Gahee Choi">
                    </div>
                    <div class="col">
                        <div class="dynamic-sec">
                            <h3>Web Developer.</h3>
                            <p class="container-sm">Gahee Choi, a versatile professional with a background in computer science and civil engineering. She is currently pursuing Web development studies at Humber College, where she is acquiring the necessary skills and knowledge to excel in this dynamic industry With a strong foundation in problem-solving and critical thinking.</p>
                            <div class="container">
                                <!-- tome: ch to php -->
                                <h3>Educations</h3>
                                <div class="row">
                                    <div class="container-sm">
                                        <p class=""><strong>Humber College</strong></p>
                                        <p class=""><i class="fa-solid fa-graduation-cap me-2"></i> Ontario Graduate Certificate
                                        </p>
                                        <p class=""><i class="fa-solid fa-book me-2"></i> Web Development</p>
                                        <p class=""><i class="fa-solid fa-calendar-days me-2"></i> Sep 2022 - Present</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr class="" />



        <!-- Skills -->
        <section id="skills" class="skills">
            <div class="container">

                <div>
                    <h2 class="section_title">Skills</h2>
                    <p>HTML, CSS, JS, C#, ASP.NET MVC, NodeJS, MySQL, Ruby on Rails, PHP, JQuery, SCSS, MongoDB</p>
                </div>

                <div class="logo-holder">
                    <div class="bg"></div>

                    <?php
                    $query = 'SELECT * from skills
                    order by percent desc';
                    $result = mysqli_query($connect, $query);

                    ?>

                    <?php
                    while ($record = mysqli_fetch_assoc($result)) : ?>
                        <div class="container-sm">
                            <h3><?php echo $record['name'] ?></h3>
                            <p>Percent: <?php echo $record['percent'] ?>%</p>
                            <div class="bar" style="--from-width:10px; --to-width:<?php echo $record['percent'] ?>%;"></div>
                        </div>
                    <?php endwhile; ?>

                </div>

            </div>

        </section>

        <hr />


        <!-- Portfolio-->
        <section class="portfolio" id="portfolio">
            <div class="container">

                <h2 class="section_title">Portfolio</h2>
                <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

                <div class="row-card">

                    <?php
                    $query = 'SELECT * FROM projects ORDER BY date DESC';
                    $result = mysqli_query($connect, $query);
                    ?>

                    <?php while ($record = mysqli_fetch_assoc($result)) : ?>

                        <div class="card">

                            <?php if ($record['photo']) : ?>
                                <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>" style="width:100%">
                            <?php else : ?>
                                <p>This record does not have an image!</p>
                            <?php endif; ?>

                            <div class="card_container">
                                <h2><?php echo $record['title']; ?></h2>
                                <?php echo $record['content']; ?>
                                <div class="row">
                                    <div class="col"> <a href="" target="_blank" class="btn">View Code</a></div>
                                    <div class="col"> <a href="" target="_blank" class="btn">View Demo</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>

        </section>

        <hr />
        <!-- Resume-->
        <section id="resume" class="resume">
            <div class="container">

                <h2 class="section_title">Resume</h2>

                <div class="row">
                    <div class="col">
                        <h2 class="">Summary</h2>
                        <div class="container-sm">
                            <ul>
                                <li> HTML, CSS, JS, C#, ASP.NET MVC, NodeJS, SQL, Ruby on Rails, PHP, JQuery, SCSS, MongoDB</li>
                                <li> Proficient in Microsoft Office (Excel, Access, Word, Power Point), MS Project</li>
                                <li> Experience with AutoCAD, Bentley MicroStation, SketchUp, Photoshop</li>
                                <li> Proven track record of successfully completing short-term and long-term projects</li>
                                <li> 5 years of customer service experience</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col">
                        <!-- tome: change this to php -->
                        <h2 class="">Education</h2>
                        <div class="container-sm">
                            <h4>Humber College</h4>
                            <p><em>Graduate Certificate in Web Development (09/2022 - 09/2023)</em></p>
                            <ul>
                                <li> Developed a database system using C# and ASP.NET MVC
                                <li> Designed and implemented a content management system with Entity Framework, LINQ, and CRUD functionality</li>
                                <li> Created a responsive website mockup using Figma</li>
                                <li> Integrated a CMS with PHP, MySQL, including login, dashboard, and project management</li>
                                <li> Built a Node.js website with Express, Pug, and MongoDB as the data source.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr />

        <!--  Contact Section  -->
        <section id="contact" class="contact">
            <div class="container">


                <h2 class="section_title">Contact me</h2>
                <div class="row">

                    <div class="col">
                        <div>
                            <div class="container-sm">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>Etobicoke, Ontario, Canada</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>Gaheekate@gmail.com</p>
                                </div>
                            </div>
                            <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Etobicoke,%20canada+(Gahee%20Choi)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">area maps</a></iframe></div>

                        </div>

                    </div>

                    <div class="col">
                        <form action="forms/contact.php" method="post" role="form" class="form-inline">

                            <div class="">
                                <label for="name">Your name:</label>
                                <input type="text" id="fname" name="name" placeholder="John Doe" />
                            </div>
                            <div class="">
                                <label for="email">Your email:</label>
                                <input type="email" id="femail" name="email" placeholder="john.doe@example.com" />
                            </div>
                            <div class="">
                                <div>
                                    <label for="message">Message:</label>
                                </div>
                                <textarea class="tbox" name="message" rows="10" required></textarea>

                                <!-- <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div> -->
                                <div style="text-align: center;"><button type="submit">Send Message</button></div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>







        <script src="js.js"></script>
</body>

</html>