<?php
require_once 'include/php/connect.php';
require_once 'UserClass.php';
?>
<script>
function animate()
        {
           $('#toppart').animate({ 
    backgroundPositionY:"100%"
}, 50000, 'linear' , function()
{
  $('#toppart').animate({ 
    backgroundPositionY:"0.5%"
}, 50000, 'linear', function()
{
  animate();
});
});
        }
        $(document).ready(function(e){
            var w = $(window).width();
            if(w > 768)
                animate();
        });
</script>
<div class="row header-background" id="toppart">
	<div class="row header-split-1">
		<div class="columns large-4 small-12 logo" ></div>
		<div class="columns large-8 small-10">
			<ul class="inline-list menu-bar" >
				<li><button class="menu-button" id="home">Home</button>
				</li>
         <li><button class="menu-button" id="loc">Locations</button>
        </li>
        <li><button class="menu-button">Contact Us</button>
        </li> 
        <?php
        if(!isset($_SESSION['curUser']))
        {
        ?>
        <li  style="float:right !important;margin-right:15px;" >
        <form action="loginCheck.php" method="post">
        <ul class="inline-list">
        <li><input type="text" style="width:150px" name="email" placeholder="Email ID"  class="signin-text" /></li>
        <li><input type="password" style="width:150px" name="password" placeholder="Password" class="signin-text" /></li>
        <li> </li>
        <li><input type="submit" value="Login" class="form-button"/></li>
        </ul>
        <label class="login-error-msg"><?php if(isset($_GET['loginerror']) && !empty($_GET['loginerror'])) echo $_GET['loginerror']; ?></label>
        </form>
        </li> 
        <?php } 
        else
        {
            $curUserId = $_SESSION['curUser'];
            $curUser = new User;
            $curUser->getUser($curUserId);
            ?>
            <li style="float:right !important;margin-right:50px;">
            <ul class="inline-list">
            <li><div class="side-profile"><?php echo $curUser->getName(); ?></div></li>
            <li><a href="logout.php" class="side-logout-container"><img src="textures/logout.png" class="side-logoutpic"/></a></li>
            </ul>
            </li>  
        <?php
        }
        ?>
			</ul>
		</div>	
	</div>
	
	<div class="row header-split-2 cloud-up " style="margin-top: 2px;">
        <div class="columns large-4 hide-for-small">
            <div class="timer-container">
              <div class="timer" id="countdown"></div>
            </div>
        </div>
	</div>
</div>