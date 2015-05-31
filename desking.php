<?php 
require_once 'include/php/connect.php';
require 'sessionCheck.php';
?>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
   <title>Makeathon Desk</title>
    <!--<script src="include/js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="include/css/foundation.css" />
    <link rel="stylesheet" href="include/css/style.css" />
    <link rel="stylesheet" href="include/css/txn-lightbox.css" />
    <link rel="stylesheet" href="include/css/jquery.countdown.css">
    <script src="include/js/vendor/custom.modernizr.js"></script>
    <script src="include/js/validate.min.js"></script>
    <script type="text/javascript" src="include/js/jquery.countdown.js"></script>  -->

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
?>
<script type="text/javascript">
    $('body').css({'overflow' : 'hidden'});
    $(document).ready(function(e){
        $('.menu-button').click(function(e){
            $('.menu-button').removeClass('selected');
            $(this).addClass('selected');
        });
        $('#home').addClass('selected');
        $('#countdown').countdown({until: new Date(2013, 8-1, 10)});
        $('#add-new-project').click(function(){
            $.ajax({
                url: 'addNewProject.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
        $('#default-home').click(function(){
            $.ajax({
                url: 'defaultHome.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
        $('#show-my-projects').click(function(){
            $.ajax({
                url: 'showMyProjects.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
    });
    $(window).load(function(){
        $('body').css({'overflow' : 'none'});
        $('.loading').fadeOut(300);
    });
</script>
</head>
<body>
<!--<div class="loading">
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
</div>-->
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

  <div class="columns large-9 small-12" id="main-body-container">
      <?php
           require 'defaultHome.php';
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
