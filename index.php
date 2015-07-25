<?php
    session_start();
    require_once 'include/php/connect.php';
    require_once 'AllClass.php';
    $allObj = new All;
    $pageName = "index.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="IEEE-VIT 2013">
    <meta name="description" content="This is an initiative that provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled.">
    <meta name="keywords" content="Build For A Change, Makeathon, IEEE-VIT, VIT, University, Projects, Students">
    <title>Build For A Change | Home</title>
    <link rel="icon" href="img/favicon.png">
    <meta name="theme-color" content="#EEEEEE">
    <!-----------------------------Stylesheets---------------------------->
    <link rel="stylesheet" type="text/css" href="include/css/styles.css">
    <!-------------------------------------------------------------------->
    <script src="include/js/init.js" type="text/javascript"></script>
</head>
<body>
<div class="loading valign-wrapper">
    <div class='valign'>
        <div class="text">Loading</div>
        <div class="bullets">
            <div class='bullet'></div>
            <div class='bullet'></div>
            <div class='bullet'></div>
            <div class='bullet'></div>
        </div>
    </div>
</div>
<?php
    require_once 'header.php';
?>
<div class="row">
    <div class="bgNavbar">
        <a href = "index.php" class="white-logo"><img src = "img/logos/bfacwhitelogo.png" alt = "Makeathon Logo" /></a>
        <div class="navigation">
            <?php
                if(!isset($_SESSION['curUser'])) {
                    echo '<a class="modal-trigger" href="#login">Login</a>';
                } else {
                    echo '<a href="logout.php">Logout</a>';
                }
            ?>
            <a href = "aboutus.php">About Us</a>
            <a href = "#contactUs" class="modal-trigger">Contact Us</a>
            <a href = "index.php">Home</a>
            <div class="overlay"></div>
        </div>
    </div>
    <div class="bg">
        <div class="tempHover">
            <h1>BUILD FOR A CHANGE</h1>
            <p><a href = "aboutus.php">We at Build for a Change (BFAC) aim at enabling problem solving through cooperative efforts in a conducive environment. We provide a platform for creative minds to combine their technical dexterity on relevant and significant technical challenges that ameliorate the society. Encouraging students to take up socially assistive projects with consistent support from NGOs and technical mentors, and finding feasible solutions, is the exclusive paramount objective of BFAC.</a></p>
        </div>
        <a class="<?php if(!isset($_SESSION['curUser'])) { echo "modal-trigger "; } ?>startProject" href="<?php if(!isset($_SESSION['curUser'])) { echo "#login"; } else { echo "desking.php"; }?>">START A PROJECT</a>
    </div>
    <div class="news-wrapper">
        <h2>Latest News</h2>
        <div class="news-container">
            <?php
                $arrayBig = $allObj->getNews();
                foreach($arrayBig as $temp) {
                    echo '
                        <div class="news-item z-depth-1">
                            <div class="news-header">
                                ' . $temp['title'] . '
                            </div>
                            <div class="news-content">
                                ' . $temp['desp'] . '
                            </div>
                            <div class="news-time">
                                At ' . $temp['date'] . ' By ' . $temp['by'] . '
                            </div>
                        </div>
                        ';
                }
            ?>
        </div>
    </div>
    <div class="organizers-wrapper">
        <div class="organizers z-depth-1">
            <h2>In collaboration with</h2>
            <div class="col l6 s12">
                <img src="img/logos/ieeevitlogo.png" alt="IEEE-VIT">
            </div>
            <div class="col l6 s12">
                <img src="img/logos/vitlogo.png" alt="VIT">
            </div>
        </div>
    </div>

<?php
    require_once "footer.php";
?>

<!--------------------------Scripts--------------------------------->
<script src="include/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="include/js/materialize.min.js" type="text/javascript"></script>
<script src="include/js/app.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>