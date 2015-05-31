<?php 
session_start();
require_once 'include/php/connect.php';
?>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
   <title>Makeathon - Forums</title>
  <script src="include/js/jquery-1.7.2.min.js"></script>
  
  <link rel="stylesheet" href="include/css/foundation.css" /> 
  <link rel="stylesheet" href="include/css/style.css" /> 
  <link rel="stylesheet" href="include/css/txn-lightbox.css" /> 
  <link rel="stylesheet" href="include/css/jquery.countdown.css">
  <script src="include/js/vendor/custom.modernizr.js"></script>
  <script src="include/js/validate.min.js"></script>
  <script type="text/javascript" src="include/js/jquery.countdown.js"></script>
  <?php
require_once 'AllClass.php';
$allObj = new All;

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
    $('#forum-data').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            var challenge = $('#forum-data').attr('challengeid');
            $.ajax({
                url: 'forumapi.php?challengeId='+challenge,
                success: function(data,status) {
                    $('#forum-data').html(data);
                }
            });    
    $('#addcomment').click(function(){
        var challenge = $('#forum-data').attr('challengeid');
        var comment = $('#doubt').val();
        $('#forum-data').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            $.ajax({
                url: 'forumapi.php?challengeId='+challenge+'&mode=add_comment&comment='+encodeURIComponent(comment) ,
                success: function(data,status) {
                    $('#forum-data').html(data);
                    $('#doubt').val('');
                }
            });
        });
    // $('.forum-delete').click(function(){
    //     var challenge = $('#forum-data').attr('challengeid');
    //     var commentid = $(this).attr('commentid');
    //     $('#forum-data').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
    //         $.ajax({
    //             url: 'forumapi.php?challengeId='+challenge+'&mode=delete_comment&commentId='+commentid ,
    //             success: function(data,status) {
    //                 $('#forum-data').html(data);
    //             }
    //         });
    //     });
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
  	$('#challenges').addClass('selected');
    $('#countdown').countdown({until: new Date(2013, 8-1, 10)});
  });
  $(window).load(function()
  {
$('body').css({'overflow' : 'none'});
$('.loading').fadeOut(300);
  });

</script>
<style type="text/css">
  .forum-content
  {
    font-family: 'os-l';
    font-size: 0.9em;
    color: #262626;
    padding: 10px;
    padding-left: 25px;

  }
  .add-project-button
  {
    display: inline-block;
    float: left !important;
    margin:10px;
    padding: 10px;
    border-radius: 3px;
    padding-left: 10px;
    padding-right: 10px;
    background: #da4600;
    border-bottom: solid 2px #a63400;
    color: #fff;
  }
  .add-project-button:hover
  {
    background: #EF5B15;
    color: #fff;
  }
  .add-project-button:focus
  {
    border-top: solid 2px #FFF;
    color: #fff;
    border-bottom: solid 1px #a63400;
  }
  .forum-person
  {
    padding: 3px !important;
    padding-left: 7px !important; 
    color:#357fd4;
    font-family: 'os-b';

  }
  .forum-time
  {
    padding: 3px !important;
    padding-left: 7px !important; 
    color:#444444;
    font-size: 0.8em;
    font-family: 'os-b';
    display: inline-block;
    float: right;

  }
  .forum-comment
  {
    padding: 5px;
    border-bottom: solid 1px #ccc;
  }
  .forum-comment:hover
  {
      background: #f2f2f2;
  }
  .forum-delete
  {
    padding: 2px !important;
    background: #f0f0f0;
    color: #171717;
    border: none;
    border-radius: 3px;
    font-size: 0.8em;
    float: right;
  }
   .forum-delete:hover,.forum-delete:focus
   {
    background: #e0e0e0;
    color: #171717;
   }
   .forum-challenge
   {
    padding: 15px !important;
    font-family: 'os-l';
   }
   .forum-submit
   {
    padding: 5px !important;
    background: #cccccc;
    color: #171717;
    border: none;
    border-radius: 3px;
    font-size: 1em;
    transition:all ease 0.3s;
    -moz-transition:all ease 0.3s;
    -webkit-transition:all ease 0.3s;
   }
   .forum-submit:hover, .forum-submit:focus
   {
      background: #444444;
    color: #e8e8e8;
   }
   .forum-settings , .forum-textbox , .forum-button
   {
    padding: 10px !important;
   }
   .project-button-container
   {
    padding-left: 0px !important;
   }
</style>
</head>
<body>
<div class="loading">
<div class="loading-content">
  <div id="followingBallsG">
      <div id="followingBallsG_1" class="followingBallsG">
      </div>
      <div id="followingBallsG_2" class="followingBallsG">
      </div>
      <div id="followingBallsG_3" class="followingBallsG">
      </div>
      <div id="followingBallsG_4" class="followingBallsG">
      </div>
      </div>
      <div class="loading-text">Loading Website Please Wait</div>
  </div>
</div>
<div class="close-button" id="closebtn" onclick="closelb()"></div>
<div class="large-12 small-12 lightboxbg" id="bg"></div>  
<div class="large-4 push-1 small-12 lightbox" id="lbox"></div>
<?php 
require "header.php";
?>
<div class="row">

  <?php
    if(isset($_SESSION['curUser']))
        echo '<div class="columns large-3 small-12"><img src="img/subs.jpg"/></div>';
    else
        require 'registerForm.php';
  ?>

  <div class="columns large-9 small-12" id="main-body-container">
<?php
$info = getdate();
$day = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$string = $year.'-'.$month.'-'.$day." ".$hour.':'.$min.':'.$sec;
$date = new DateTime($string);
$date->add(new DateInterval('PT5H30M'));
?>
        <div class="body-header">Forum</div>
        <div class="row">
          <div class="columns large-10 forum-challenge large-offset-1">
          <?php 
          if(isset($_GET['challengeId']))
          {
        $result = $GLOBALS['db']->raw("SELECT * FROM challenges WHERE Id=".$_GET['challengeId']);
        $row = $result->fetch_assoc(); 
        echo $row['Statement'];

          }
              ?>
          </div>
        </div>
        <div id="forum-data" class="columns large-10 large-offset-1" challengeId="<?php echo $_GET['challengeId'] ?>">
            <!-- <div class="columns large-12 forum-comment">
              <div class="columns large-8 forum-person">Vasu Mahesh</div><div class="columns large-3 forum-time"><?php echo $date->format('jS M Y')."  ".$date->format('H:i A'); ?></div><div class="columns large-1"><button class="forum-delete" commentid="2">Delete</button></div>
              <div class="forum-content columns large-12">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>          
            </div>  --> 
        </div>
        <?php 
        if(isset($_SESSION['curUser']))
        {
          ?>
        <div class="row forum-settings">
        <div class="row">
        <div class="columns large-10 large-offset-1 forum-textbox">
        <textarea id="doubt" placeholder="Ask Your Doubts"></textarea>
        </div>
        </div>
        <div class="columns large-10 large-offset-1 forum-button">
        <input type="button" class="form-button" id="addcomment" value="Post Comment"/>
        </div>
        <div class="columns large-3"></div>
        </div>
        <div class="row">
          <div class="columns large-11 large-offset-1 project-button-container">
            <a class="add-project-button" href="desking.php?challengeId=<?php echo $_GET['challengeId'] ?>">Add Project For This Challenge</a>
          </div>
        </div>
        <?php 
        } 
        ?>
    </div>
</div>
<?php 
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
