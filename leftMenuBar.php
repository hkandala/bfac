<script>
    $(document).ready(function(e){
        $('#add-new-project').click(function(){
        $('#main-body-container').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            $.ajax({
                url: 'addNewProject.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
        $('#default-home').click(function(){
        $('#main-body-container').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            $.ajax({
                url: 'defaultHome.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
        $('#show-my-projects').click(function(){
        $('#main-body-container').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            $.ajax({
                url: 'showMyProjects.php' ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
    });
</script>
<div class="columns large-3">
<div class="row">
  <div class="columns large-12  small-12 form-header" >Dashboard</div><br/>
  <div class="columns large-12 side-button-container">
    <div class="columns large-12 side-button" id="default-home">Home</div>
        <div class="columns large-12 side-button" id="show-my-projects">My Projects</div>
    <div class="columns large-12 side-button" id="add-new-project">New Project</div>
  </div>
  </div>
  <div class="row">
  <div class="large-12" style="text-align:center;padding-top:25px !important"><br><br>For Any Queries Contact : <br><br>Richie Roy (8940506637) <br>Shruti Arya (8940309194)</div>
  </div>
</div>