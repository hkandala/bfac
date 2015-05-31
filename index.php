<?php 
session_start();
require_once 'include/php/connect.php';
?>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
   <title>Makeathon</title>
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
  <div class="columns large-3">
    <div class="columns large-12  small-12 form-header" >Register</div>
    <div class="columns large-12  small-12 form-subheader" >Fill in your details.</div>
    <br/><br/><br/>
    <form class="large-12  columns" name="regform" action="signupCheck.php" method="post">
    
      <div class="columns large-12 small-12"><label class="form-label">Name</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="name" placeholder="Eg: Ishaan Shrivastava"/></div>
      <div class="columns large-12 small-12"><label class="form-label">Email</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="email" placeholder="Eg: ishaans@gmail.com" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Password</label></div>
      <div class="columns large-12 small-12"><input type="password" class="form-text" name="password" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Confirm Password</label></div>
      <div class="columns large-12 small-12"><input type="password" class="form-text" name="confirmpassword" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Institution</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" value="VIT Vellore" name="college" /></div>
      <div class="columns large-12 small-12"><label class="form-label">Branch & Year</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="branch" placeholder="Eg: CSE 4th Year"/></div>
      <div class="columns large-12 small-12"><label class="form-label">Phone Number(+91)</label></div>
      <div class="columns large-12 small-12"><input type="text" class="form-text" name="phoneno" placeholder="Eg: 9876543210" /></div>
      <div id="error" class="columns large-12 small-12"></div>
      <div class="columns large-12 small-12  form-subheader form-footer">By clicking you agree to the Terms & Conditions of Makeathon</div>
      <div type="button" class="columns large-12 small-12 ">
        <input type="submit"class="form-button " value="I'm in" />
      </div>
    </form>
  </div>
  <div class="columns large-9 small-12">
      <div class="hide-for-medium-down quote">
          <div class='quote-heading'>It is not enough to be busy<br>we must ask 'what are we busy about?'</div>
          <div class="quote-by">-David Henry Thoreau</div>
      </div><br/><br/>
      <div class="columns large-12 small-12">
      <div class="body-header">About</div><br>
        <div class="body-text">
        The make-a-thon initiative provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled. The prototypes are to be cost effective with the intention of making school life for both the children and the teachers easier.
		</div><br><br>
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
          <li><img class="sponsor-image" src="textures/ji.jpg"></li>
          <li><img class="sponsor-image" src="textures/ieeevit.jpg"></li>
          <li><img class="sponsor-image" src="textures/vit.jpg"></li>
          <li><img class="sponsor-image" src="textures/i4d.jpg"></li>
        </ul>
      </div>
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
