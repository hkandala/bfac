<?php 
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';
require_once 'UserClass.php';
require 'sessionCheck.php';
?>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
   <title>Makeathon Desk</title>
  <script src="include/js/jquery-1.7.2.min.js"></script>
  
  <link rel="stylesheet" href="include/css/foundation.css" /> 
  <link rel="stylesheet" href="include/css/style.css" /> 
  <link rel="stylesheet" href="include/css/txn-lightbox.css" /> 
  <link rel="stylesheet" href="include/css/jquery.countdown.css">
  <script src="include/js/vendor/custom.modernizr.js"></script>
  <script src="include/js/validate.min.js"></script>
  <script type="text/javascript" src="include/js/jquery.countdown.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="include/css/jquery.tagedit.css">
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="include/js/jquery.tagedit.js"></script>
    <script type="text/javascript" src="include/js/jquery.autoGrowInput.js"></script>
  <?php
require_once 'AllClass.php';
$allObj = new All;
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
//     $("#teammembers").autocomplete({
// source: "team_autocomplete.php",
// minLength: 2,//search after two characters
//  select: function( event, ui ) {
// $( "#teammembers" ).val( ui.item.Email );
// return false;
// }
// })
// .data( "autocomplete" )._renderItem = function( ul, item ) {
// return $( "<li>" )
// .data( "item.autocomplete", item )
// .append( "<a>" + item.Name + "<br>" + item.Email + "</a>" )
// .appendTo( ul );
// };
$( "#tagform-editonly" ).find('input.tag').tagedit({
      autocompleteURL: 'team_autocomplete.php',
      allowEdit: false
    });
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
  .dropdown
  {
    background-color: white;
  font-family: inherit;
  border: 1px solid #cccccc;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  color: rgba(0, 0, 0, 0.75);
  display: block;
  font-size: 0.875em;
  margin: 0 0 1em 0;
  padding: 0.5em;
  height: 2.3125em;
  width: 100%;

  }
  .tags
  {
    height: 2.5125em !important;
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
  <!--<div class="columns large-4">
    <div class="columns large-11 large-offset-1 small-12 form-header" >Register</div>
    <div class="columns large-11 large-offset-1 small-12 form-subheader" >Fill in your details.</div>
    <br/><br/><br/>
    <form class="large-11 large-offset-1 columns" name="regform" action="signupCheck.php" method="post">
    
      <div class="columns large-12 small-12"><label class="form-label">Name</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="name" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Email</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="email" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Password</label></div>
      <div class="columns large-12 small-12"><input type="password" class="form-text" name="password" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Confirm Password</label></div>
      <div class="columns large-12 small-12"><input type="password" class="form-text" name="confirmpassword" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Institution</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" value="VIT Vellore" name="college" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Branch</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="branch" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Phone Number</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="phoneno" /></div>
      <div id="error" class="columns large-12 small-12"></div>
      <div class="columns large-12 small-12  form-subheader form-footer">By clicking you agree to the Terms & Conditions of Makeathon</div>
      <div type="button" class="columns large-12 small-12 ">
        <input type="submit"class="form-button " value="I'm in" />
      </div>
    </form>
  </div>-->
  <?php require 'leftMenuBar.php'; ?>

  <div class="columns large-9 small-12">
      <form id="tagform-editonly" class="large-11 large-offset-1 columns" name="abstractform" action="submitAbstract.php" method="post">
      <?php 
        if(isset($_GET['id']) && !empty($_GET['id']))
        {
           $project = new Project($_GET['id']);
           $project->getProject($_GET['id']);
           $title=$project->title;
           $challengeId=$project->challengeId;
           $abstract=$project->abstract;
           $requirement=$project->requirement;
           $whymak=$project->whymak;
           $team=$project->getTeamAdmin($_GET['id'],$curUser->id);           
        }
        else
        {
           $title="";
           $team = "";
           $challengeId="";
           $abstract="";
           $requirement="";
           $whymak="";
        }
    ?>
      <div class="columns large-12 small-12"><label class="form-label">App/Project Title</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="title" value='<?php echo $title;?>'/></div>
      <div class="columns large-12 small-12"><label class="form-label">Challenge</label></div>
      <div class="columns large-12 small-12">
      <select name="challenge" class="dropdown">
      <option value="0" <?php
      if(!isset($_GET['id']))
      {
        echo "selected";        
        } ?>>Select a Challenge</option>

      <?php 
      $result = $GLOBALS['db']->raw("SELECT * FROM challenges");
          while ($row = $result->fetch_assoc()) 
          {
            ?>
            <option <?php         
            echo "value='".$row['Id']."'  "; 
            if(isset($_GET['id']))
              {
                if($challengeId == $row['Id'])
                echo "selected";        
                }
            ?>
            >
                <?php echo substr($row['Statement'],0,150)."..." ?>
            </option> 
        <?php
          }?>
          </select>
          </div>
          <?php 
          if(!isset($_GET['id']) || (isset($_GET['id']) && $team['Status'] == 0))
          {
          ?>
      <div class="columns large-12 small-12"><label class="form-label">Team Members</label></div>
      <div class="columns large-12 small-12">
      <?php
      if(isset($_GET['id']) && $team['Status'] == 0)
      {
        $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
        $i=0;
        while ($row = $result->fetch_assoc()) 
        {

          $user = new User;
          $user->getUser($row['UserId']);
          if($curUser->id == $user->id)
          {
            continue;
          }
          echo '<input type="text" name="tag['.$i.'-a]" value="'.$user->name.' ('.$user->email.')" class="tag"/>';
          $i++;      
        }
      }
      else
      {
        ?>
      <input type="text" value="" class="tag tags" name="tag[]"/>
      <?php 
      } 
      echo "</div>";
      }
      else
      {
        $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
        echo '<div class="columns large-12 small-12"><label class="form-label">Team Members</label></div><ul class="columns large-12 teambubble-list">';
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
    }
      ?>
      
      <div class="columns large-12 small-12"><label class="form-label">Abstract</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" name="abstract" ><?php echo $abstract;?></textarea> </div>
      <div class="columns large-12 small-12"><label class="form-label">Requirement</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" name="requirement" ><?php echo $requirement;?></textarea> </div>
      <div class="columns large-12 small-12"><label class="form-label">Why Makeathon?</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" name="whymak" ><?php echo $whymak;?></textarea> </div>
      <div id="error" class="columns large-12 small-12"></div>
      <div type="button" class="columns large-12 small-12 ">
        <input type="submit"class="form-button " value="Submit" />
      </div>
      <?php if(isset($_GET['id']) && !empty($_GET['id'])) echo "<input type='hidden' name='id' value='".$_GET['id']."' />"; ?>
    </form>
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