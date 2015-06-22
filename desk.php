<?php
require_once 'UserClass.php';
session_start();
if(!isset($_SESSION['curUser'])) {
	header("Location: index.php");

}
$curUserId = $_SESSION['curUser'];
$curUser = new User;
$curUser->getUser($curUserId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="en-us" http-equiv="Content-Language">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Makeathon - Your Desk</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link rel="shortcut icon" href="include/favicon.ico"/>
    <link rel="StyleSheet" href="include/css/ui-lightness/jquery-ui-1.8.6.custom.css" type="text/css" media="all"/>
    <link rel="StyleSheet" href="include/css/jquery.tagedit.css" type="text/css" media="all"/>    
	<script src="include/js/jquery.validate.min" type="text/javascript"></script>
    <script type="text/javascript" src="include/js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/javascript" src="include/js/jquery.autoGrowInput.js"></script>
    <script type="text/javascript" src="include/js/jquery.tagedit.js"></script>
	<link rel="stylesheet" href="include/css/jquery.countdown.css">
	<script src="include/js/vendor/custom.modernizr.js"></script>
	<script type="text/javascript" src="include/js/jquery.countdown.js"></script>
	<link rel="stylesheet" href="include/css/foundation.css" /> 
	<link rel="stylesheet" href="include/css/style.css" />
	<script src="include/js/deskAjax.js" type="text/javascript"></script>
	<script type="text/javascript">
        function loadProjectDetails(id) {
            var urlsent='projectDetails.php?id='+id;
            $.ajax({
            url: urlsent ,
            success: function(data,status) {
            console.log("Data: " + data + "\nStat: " + status);
            $('#content').html(data);
            }

          });
        }
        function addPost() {
            var heading= document.getElementById('newpost-text').value;
            var button_handle = document.getElementById('project-main-button');
            var id = button_handle.getAttribute('projectid');
            var urlsent='postHandler.php?addPost=true&heading='+heading+'&id='+id;
            $.ajax({
            url: urlsent ,
            success: function(data,status) {
            console.log("Data: " + data + "\nStat: " + status);
            $('#post-content').html(data);
            }
          });
        }
        function addComment() {
            var comment= document.getElementById('newcomment-text').value;
            var button_handle = document.getElementById('comment-main-button');
            var id = button_handle.getAttribute('postid');
            var urlsent='postHandler.php?addComment=true&comment='+comment+'&id='+id;
            $.ajax({
            url: urlsent ,
            success: function(data,status) {
            console.log("Data: " + data + "\nStat: " + status);
            $('#post-content').html(data);
            }
          });
        }
        function postClick(postid) {
            var urlsent='postHandler.php?viewPost=true&id='+postid;
            $.ajax({
            url: urlsent ,
            success: function(data,status) {
            console.log("Data: " + data + "\nStat: " + status);
            $('#post-content').html(data);
            }

          });
        }
	</script>
</head>
<body>
<?php 
    require_once "header.php";
?>
<div class="row">
    <div class="columns large-4">
        <input name="homeButton" type="button" value="Home" onclick="loadAllProjects();"><br>
        <input name="myProjectsButton" type="button" value="My Projects" onclick="loadMyProjects();"><br>
        <input name="newProjectButton" type="button" value="New Project" onclick="newProject();">
        <a href="logout.php">Logout</a>
    </div>
    <div class="columns large-8 small-12">
        <div class="columns large-12">Welcome to your desk <?php echo $curUser->name ?></div>
    <div class="columns large-12 small-12">
        <div class="body-header">About</div><br>
        <div class="body-text">
            The make-a-thon initiative provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled. The prototypes are to be cost effective with the intention of making school life for both the children and the teachers easier.
        </div><br><br>
        <div class="body-header" style="display:none">News</div><br>
        <div class="news-item" style="display:none">
            <div class="news-container">
                <div class="news-header">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                </div>
                <div class="news-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                </div>
            </div>
            <div class="news-time">at 6:00 AM By : Admin</div>
        </div>
        <div class="news-item" style="display:none">
            <div class="news-container">
                <div class="news-header">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                </div>
                <div class="news-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                </div>
            </div>
            <div class="news-time">at 6:00 AM By : Admin</div>
        </div>
        <div class="news-item" style="display:none">
            <div class="news-container">
                <div class="news-header">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                </div>
                <div class="news-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                </div>
            </div>
            <div class="news-time">at 6:00 AM By : Admin</div>
        </div>
        <br>
        <br>
        <div class="body-header">Organizers</div><br>
        <ul class="inline-list">
            <li><img class="sponsor-image" src="textures/ji.jpg"></li>
            <li><img class="sponsor-image" src="textures/ieeevit.jpg"></li>
            <li><img class="sponsor-image" src="textures/vit.jpg"></li>
            <li><img class="sponsor-image" src="textures/i4d.jpg"></li>
        </ul>
      </div>
  </div>
</div>

<?php 
    require_once "footer.php";
?>
<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'include/js/vendor/zepto' : 'include/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="include/js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>