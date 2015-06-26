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
            <p>The make-a-thon initiative provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled. The prototypes are to be cost effective with the intention of making school life for both the children and the teachers easier.</p>
        </div>
        <a class="<?php if(!isset($_SESSION['curUser'])) { echo "modal-trigger "; } ?>startProject" href="<?php if(!isset($_SESSION['curUser'])) { echo "#login"; } else { echo "desking.php"; }?>">START A PROJECT</a>
    </div>

      <div class="body-header">News</div><br>
      <?php
      $arrayBig = $allObj->getNews();
      foreach($arrayBig as $temp)
      {
      ?>
        <div class="news-item">
          <div class="news-container">
            <div class="news-header">
              <?php echo $temp['title'] ?>
            </div>
            <div class="news-content">
            <?php echo $temp['desp'] ?>
            </div>
          </div>

          <div class="news-time">At <?php echo $temp['date'] ?> By <?php echo $temp['by'] ?></div>
        </div>
        <?php }

        ?>
        <br>

        <div class="body-header">Issues</div><br>
        <ul class="inline-list issue-list">
        <?php
        $arrayBig = $allObj->getIssues();
        foreach($arrayBig as $temp)
        {
        ?>
        <li>
            <div class="issue-box issue-image" style="background-image: url(<?php echo "'".$temp['image']."'" ?>)">
              <div class="issue-box-bg">
                  <div class="issue-header"><?php echo $temp['title'] ?></div>
                  <div class="issue-content">
                  <?php echo $temp['summary'] ?></div>
            </div>
            </div>
          </li>

        <?php
        }
        ?>

        </ul>
        <br>
        <div class="body-header">Organizers</div><br>
        <ul class="inline-list">
          <li><img class="sponsor-image" src="img/logos/ieeevitlogo.png"></li>
          <li><img class="sponsor-image" src="img/logos/vitlogo.png"></li>
        </ul>
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