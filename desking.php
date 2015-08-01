<?php
    header('location: detailsForm.php');
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';
    require_once 'AllClass.php';
    $allObj = new All;
    $pageName = "desking.php";
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
    <title>Build For A Change | Desk</title>
    <link rel="icon" href="img/favicon.png">
    <!-----------------------------Stylesheets---------------------------->
    <link rel="stylesheet" type="text/css" href="include/css/ui-lightness/jquery-ui-1.9.2.custom.min.css"/>
    <link rel="stylesheet" type="text/css" href="include/css/jquery.tagedit.css"/>
    <link rel="stylesheet" type="text/css" href="include/css/styles.css">
    <!-------------------------------------------------------------------->
    <script src="include/js/init.js" type="text/javascript"></script>
</head>
<body>
<?php
	require_once "header.php";
?>
    <div id="main-body-container">
        <div class="preloader-container">
            <div class="preloader-align">
                <div class="preloader-wrapper medium active">
                    <div class="spinner-layer spinner-green-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <div class="unableToConnect hide">
                    <span>:(&nbsp;</span>
                     Unable to connect to network
                </div>
            </div>
        </div>
        <div class="content-container"></div>
    </div>
<?php
    require_once "footer.php" ;
?>

<!--------------------------Scripts--------------------------------->
<script src="include/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="include/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="include/js/jquery.autoGrowInput.js" type="text/javascript"></script>
<script src="include/js/jquery.tagedit.js" type="text/javascript"></script>
<script src="include/js/materialize.min.js" type="text/javascript"></script>
<script src="include/js/app.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>