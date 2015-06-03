<?php 
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';
require 'sessionCheck.php';
?>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
   <title>Makeathon</title>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  
  <link rel="stylesheet" href="include/css/foundation.css" /> 
  <link rel="stylesheet" href="include/css/style.css" /> 
  <link rel="stylesheet" href="include/css/txn-lightbox.css" /> 
  <link rel="stylesheet" href="include/css/jquery.countdown.css">
  <script src="include/js/vendor/custom.modernizr.js"></script>
  <script src="include/js/validate.min.js"></script>
  <script type="text/javascript" src="include/js/jquery.countdown.js"></script>
  <?php
require_once 'AllClass.php';
$newsVariable = new All;
if(isset($_SESSION['error']) && !empty($_SESSION['error']))
{
	if($_SESSION['error']== 'email')
	{
	$_SESSION['error']=null;
	echo "<script>
	$(document).ready(function(e){
		lightboxon('Email Matches ... Perhaps you are already registered?');
	});	
</script>";
	}
}

if(isset($_SESSION['success']) && !empty($_SESSION['success']))
{
	$_SESSION['success']=null;
	echo "<script>
	$(document).ready(function(e){
		lightboxon('Registration Successful. Portal will be open on 5th. See you soon :)');
	});	
	
</script>";
}
?>
<script type="text/javascript">
$('body').css({'overflow' : 'hidden'});
		function closelb()
        {
            $('#closebtn').css('opacity',0.0);
            $('#lbox').css('opacity',0.0);
            $('#bg').css('opacity',0.0);
            $('#lbox').css('z-index',0);
            $('#bg').css('z-index',0);
            document.getElementById("lbox").innerHTML = '';
        }
        function lightboxon(text)
        {
			$('#lbox').css('z-index',100);
            $('#bg').css('z-index',50);
            $('#lbox').css('opacity',1.0);
            $('#bg').css('opacity',0.5);
            var w = $(window).width();
                    $('#closebtn').css('opacity', 1.0);
                     $('#closebtn').css('margin-left', w-25+'px');   
            document.getElementById("lbox").innerHTML='<div class="lightbox-content">'+text+'</div>';     	
        }
        
  $(document).ready(function(e){

  	$('.menu-button').click(function(e){

		$('.menu-button').removeClass('selected');
		// var id = $(this).attr('id');
		// var id_rep = id.replace('#','');
			$(this).addClass('selected');

	});
  	$(document).keyup(function(e) {

  if (e.keyCode == 27) { 
			$('#closebtn').css('opacity',0.0);
            $('#lbox').css('opacity',0.0);
            $('#bg').css('opacity',0.0);
            $('#lbox').css('z-index',0);
            $('#bg').css('z-index',0);
            document.getElementById("lbox").innerHTML = '';
  } 
});
  	$('#home').addClass('selected');
    $('#countdown').countdown({until: new Date(2013, 8-1, 10)});
  });
  $(window).load(function()
  {
$('body').css({'overflow' : 'none'});
$('.loading').fadeOut(300);
  });

</script>
<style type="text/css">
.sol-title
{
  font-family: 'os-b';
  font-size: 1.7em;
  padding: 0px !important;
  color: #3b98a7;
  padding-bottom: 5px;
  margin-bottom: 5px;
  
}
.sol-header
{
  font-family: 'os-l';
  font-size: 1.5em;
  padding: 0px !important;
  color: #171717;
  margin-bottom: 5px;  
}
.padder-bottom
{
    padding-top: 10px !important;
    padding-bottom: 10px !important;
}
.sol-desp
{
  margin-left: 10px !important;
    line-height: 120%;
    padding: 10px;
    padding-left: 0px;
}
.sol-pic
{
  
  padding: 0 5px 5px 0 !important;
  margin: 0 5px 5px 0 !important;
}
.issue-tag
{
  display: inline-block;
    margin:10px;
    padding: 5px;
    font-family: 'os-l';
    font-size: 0.7em;
    padding-left: 10px;
    padding-right: 10px;
    background: #009DDC;
    color: #fff;
}
.sol-container
{
  border-left: solid 1px #ccc;
  margin-left: 10%;
}
.teambubble-list
  {
    padding-left: 10px;
    display: inline-block;
    list-style-type: none;
  }
  .teambubble
  {
    display: inline-block;
    float: left !important;
    margin:10px;
    padding: 5px;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    background: #3b98a7;
    border-bottom: solid 2px #286973;
    color: #fff;
  }
  .teambubble-admin
  {
    display: inline-block;
    float: left !important;
    margin:10px;
    padding: 5px;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    background: #da4600;
    border-bottom: solid 2px #a63400;
    color: #fff;
  }
</style>
</head>
<body>

<?php 

require "header.php";
?>
<div class="row">
  <?php require 'leftMenuBar.php'; ?>
    <div class="columns large-9 small-12">
    <div class="row">
        <div class="columns large-7">
        <div class="columns large-12">
          <div class="sol-title"><?php 
            $projectVariable = new Project($_GET['id']);
            $projectVariable->getProject($_GET['id']);
            echo $projectVariable->title;
          ?></div>     
        </div>
        <div class="columns large-12">
          <div class="sol-header padder-bottom" style="float:left;">Issue : <span class="issue-tag">
          <?php
          $result = $GLOBALS['db']->raw("SELECT c.*, p.* FROM challenge_issue c INNER JOIN projects p ON c.ChallengeId = p.ChallengeId WHERE p.ProjectId='".$_GET["id"]."'");
          $row = $result->fetch_assoc();
          $temp = $row["IssueId"];
          $challengeid = $row["ChallengeId"];
          $result = $GLOBALS['db']->raw("SELECT * FROM issues WHERE Id='".$temp."'");
          $row = $result->fetch_assoc();
          echo $row["Title"];
          ?>
          </span></div>     
        </div>
        <div class="columns large-12 padder-bottom">
        <div class="sol-header padder-bottom">Challenge</div>
        <div class="sol-content">
        <?php
        $result = $GLOBALS['db']->raw("SELECT * FROM challenges WHERE Id='".$challengeid."'");
        $row = $result->fetch_assoc();
        echo $row["Statement"];
        ?>
        </div>
        </div>
        <div class="columns large-12 padder-bottom">
        <div class="sol-header">Team</div>
        <?php 
        $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
        echo '<ul class="columns large-12 teambubble-list">';
        while ($row = $result->fetch_assoc()) 
        {
          $user = new User;
          $user->getUser($row['UserId']);
          if($curUser->id == $user->id)
          {
            echo '<li>
              <div class="teambubble-admin">'.$user->name.' (Team Leader)</div>
          </li>';
          }
          else
          {
          echo '<li>
              <div class="teambubble">'.$user->name.'</div>
          </li>';
          }
        }
      echo "</ul>";
      
      ?>
        </div></div>
        <div class="columns large-5">
        <img src="textures/1.jpg"/>
        </div>
      </div>
      <div class="columns large-12">
      <div class="row">
      <div class="columns large-12 padder-bottom"><div class="sol-header">Abstract</div></div>
      <div class="columns large-12">
        <div class="sol-content"><?php echo $projectVariable->abstract ?></div>
        </div>
    </div>
    
    <div class="row">
    <div class="columns large-12 padder-bottom"><div class="sol-header">Requirements</div></div>
        <div class="columns large-12">
        <div class="sol-content"><?php echo $projectVariable->requirement ?></div>
    </div>
    </div>
    <div class="row">
    <div class="columns large-12  padder-bottom"><div class="sol-header">Why Makeathon?</div></div>
    <div class="columns large-12">
        <div class="sol-content"><?php echo $projectVariable->whymak ?></div>
        </div>
    </div>
    </div>

</div>
</div>
<?php http://localhost/mak3aug/textures/ji.jpg
require "footer.php";
?>
	<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'include/js/vendor/zepto' : 'include/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="include/js/foundation.min.js"></script>
  <!--
  
  <script src="include/js/foundation/foundation.js"></script>
  
  <script src="include/js/foundation/foundation.alerts.js"></script>
  
  <script src="include/js/foundation/foundation.clearing.js"></script>
  
  <script src="include/js/foundation/foundation.cookie.js"></script>
  
  <script src="include/js/foundation/foundation.dropdown.js"></script>
  
  <script src="include/js/foundation/foundation.forms.js"></script>
  
  <script src="include/js/foundation/foundation.joyride.js"></script>
  
  <script src="include/js/foundation/foundation.magellan.js"></script>
  
  <script src="include/js/foundation/foundation.orbit.js"></script>
  
  <script src="include/js/foundation/foundation.reveal.js"></script>
  
  <script src="include/js/foundation/foundation.section.js"></script>
  
  <script src="include/js/foundation/foundation.tooltips.js"></script>
  
  <script src="include/js/foundation/foundation.topbar.js"></script>
  
  <script src="include/js/foundation/foundation.interchange.js"></script>
  
  <script src="include/js/foundation/foundation.placeholder.js"></script>
  
  <script src="include/js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
  <script type="text/javascript">
var validator = new FormValidator('regform', [
{
    name: 'name',
    display: 'name',    
    rules: 'required'
}, {
    name: 'email',
    rules: 'alpha_numeric|required'
}, {
    name: 'password',
    rules: 'required'
}, {
    name: 'confirmpassword',
    display: 'password confirmation',
    rules: 'required|matches[password]|min_length[6]'
}, {
    name: 'email',
    rules: 'valid_email'
}, {
    name: 'college',
    rules: 'required'
}, {
    name: 'branch',
    rules: 'required'
}, {
    name: 'phoneno',
    rules: 'required|numeric|max_length[10]|min_length[10]'
}], function(errors, event) {
    if (errors.length > 0) {
        var errorString = '';
        
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            errorString += errors[i].message + '<br />';
        }
        
        document.getElementById('error').innerHTML = '<br><br>'+errorString+'<br><br>';
    }
});
  </script>
</body>
</html>
