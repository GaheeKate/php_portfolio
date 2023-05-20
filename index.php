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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" type="text/css" rel="stylesheet">


    <meta content="Gahee Kate Choi's portfolio" name="description">
    <meta content="Gahee Choi" name="author">




</head>


<body id="page-top">

    <header id="header">
        <div class="sidenav" id="nav">

            <div class="hidden">
                <img src="img/GaheeChoiAvatar.jpeg" alt="Pic of Gahee Choi" class="header_img__avartar">
                <h1 class="nav_title"><a href="http://katekate.infinityfreeapp.com/php-cms-main/#home">Gahee Choi</a>
                </h1>
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
                <a href="https://www.linkedin.com/in/gahee-choi-855645b8/" class="linkedin"><i
                        class="fa-brands fa-linkedin"></i></a>
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
                    <div class="col-4">
                        <img class="about_pic" src="img/GaheeChoiAvatar.jpeg" alt="Pic of Gahee Choi">
                    </div>
                    <div class="col-8">
                        <div class='container'>
                            <div class='row'>
                                <h3>Web Developer</h3>
                                <p>Gahee Choi, a versatile professional with a background in computer
                                    science and civil engineering. She is currently pursuing Web development studies at
                                    Humber College, where she is acquiring the necessary skills and knowledge to excel
                                    in
                                    this dynamic industry With a strong foundation in problem-solving and critical
                                    thinking.
                                </p>
                            </div>
                            <div class='row'>
                                <?php
                                $query = 'SELECT * from education';
                                $result = mysqli_query($connect, $query);

                                ?>
                                <h3>Educations</h3>
                                <div id="leftalign" class="row">
                                    <?php
                                    while ($record = mysqli_fetch_assoc($result)): ?>
                                        <div class="col">
                                            <p><strong>
                                                    <?php echo $record['SchoolName'] ?>
                                                </strong></p>
                                            <p><i class="fa-solid fa-graduation-cap me-2"></i>
                                                <?php echo $record['CertType'] ?>
                                            </p>
                                            <p><i class="fa-solid fa-book me-2"></i>
                                                <?php echo $record['CourseName'] ?>
                                            </p>
                                            <p><i class="fa-solid fa-calendar-days me-2"></i>
                                                <?php echo $record['Period'] ?>
                                            </p>

                                        </div>
                                    <?php endwhile; ?>
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
                </div>

                <div class="logo-holder">
                    <div class="bg"></div>

                    <?php
                    $query = 'SELECT * from skills
                    order by name desc';
                    $result = mysqli_query($connect, $query);

                    ?>

                    <?php
                    //these bg colors are provided from boot strap
                    $bgColors = array("primary", "secondary", "success", "danger", "warning", "info", "light", "dark");
                    $colorIndex = 0;

                    while ($record = mysqli_fetch_assoc($result)):
                        //This is to loop through the array. bgcolor becomes remainder of the code below.
                        //while color index increasing, colors are changing by the loop in order 
                        //when colrindex becomes 7, 7%7 becomes 0 and the loop starts again from the beginning
                        $bgColor = $bgColors[$colorIndex % count($bgColors)];
                        $colorIndex++;
                        ?>

                        <span class="badge text-bg-<?php echo $bgColor; ?>"><?php echo $record['name']; ?></span>

                    <?php endwhile; ?>



                </div>

            </div>

        </section>

        <hr />


        <!-- Portfolio-->
        <section class="portfolio" id="portfolio">

            <div class="container">
                <div class="row">
                    <h2 class="section_title">Portfolio</h2>
                    <?php
                    $query = 'SELECT * FROM projects ORDER BY date DESC';
                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php while ($record = mysqli_fetch_assoc($result)): ?>
                        <div class="col">
                            <div class="card">
                                <div class="content">
                                    <div class="imgBx">
                                        <?php if ($record['photo']): ?>
                                            <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>"
                                                style="width:100%">
                                        <?php else: ?>
                                            <p>This record does not have an image!</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            <?php echo $record['title']; ?>
                                        </h3>
                                        <p class="card-text">
                                            <?php echo $record['content']; ?>
                                        </p>
                                    </div>
                                </div>
                                <ul class="sci">
                                    <li>
                                        <a href="<?php echo $record['url']; ?>" target="_blank">View Demo</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $record['demo']; ?>" target="_blank">View Code</a>
                                    </li>

                                </ul>
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
                        <div class="row">
                            <h2 class="">Summary</h2>
                            <div class="container-sm">
                                <ul>
                                    <li> HTML, CSS, JS, C#, ASP.NET MVC, NodeJS, SQL, Ruby on Rails, PHP, JQuery, SCSS,
                                        MongoDB</li>
                                    <li> Proficient in Microsoft Office (Excel, Access, Word, Power Point), MS Project
                                    </li>
                                    <li> Experience with AutoCAD, Bentley MicroStation, SketchUp, Photoshop</li>
                                    <li> Proven track record of successfully completing short-term and long-term
                                        projects
                                    </li>
                                    <li> 5 years of customer service experience</li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <h2 class="">Education</h2>

                            <div class="container-sm">
                                <?php
                                $query = 'SELECT * from education';
                                $result = mysqli_query($connect, $query);

                                ?>
                                <div class="row" style="flex-direction: column;">
                                    <?php
                                    while ($record = mysqli_fetch_assoc($result)): ?>
                                        <div class="container-sm">
                                            <p><strong>
                                                    <?php echo $record['SchoolName'] ?>
                                                </strong></p>
                                            <p>
                                                <?php echo $record['CourseName'] ?> (
                                                <?php echo $record['CertType'] ?>)
                                            </p>
                                            <p>
                                                <?php echo $record['Period'] ?>
                                            </p>
                                            <ul>
                                                <?php
                                                $desc_result = mysqli_query($connect, "SELECT * FROM descs WHERE refid={$record['id']}");
                                                while ($desc = mysqli_fetch_assoc($desc_result)): ?>
                                                    <li>
                                                        <?php echo $desc['description'] ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h2 class="">Experience</h2>

                        <div class="container-sm">
                            <?php
                            $query = 'SELECT * from experience';
                            $result = mysqli_query($connect, $query);

                            ?>
                            <div class="row" style="flex-direction: column;">
                                <?php
                                while ($record = mysqli_fetch_assoc($result)): ?>
                                    <div class="container-sm">
                                        <p><strong>
                                                <?php echo $record['compname'] ?>
                                            </strong></p>
                                        <p>
                                            <?php echo $record['position'] ?>
                                        </p>
                                        <p>
                                            <?php echo $record['period'] ?>
                                        </p>
                                        <p>
                                            <?php echo $record['duty'] ?>
                                        </p>

                                    </div>
                                <?php endwhile; ?>
                            </div>
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
                            <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Etobicoke,%20canada+(Gahee%20Choi)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                        href="https://www.maps.ie/distance-area-calculator.html">area
                                        maps</a></iframe>
                            </div>

                        </div>

                    </div>

                    <div class="col">
                        <form action="admin/msg_add.php" method="post" role="form" class="form-inline">

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


                                <div style="display:none" class="sent-message">Your message has been sent. Thank you!
                                </div>

                                <div style="text-align: center;"><button type="submit">Send Message</button></div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>






        <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
        <script src="https://kit.fontawesome.com/b88d076b90.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

        <script src="js.js"></script>
</body>

</html>