<?php
    require_once "ProjectClass.php";
    require "include/php/connect.php";
    require_once "AllClass.php";
    require "sessionCheck.php";
?>

<script>
    $(document).ready(function(e){
        $("#editProjectButton").click(function(e){
         $('#main-body-container').html('<div id=\"followingBallsG\"><div id=\"followingBallsG_1\" class=\"followingBallsG\"></div><div id=\"followingBallsG_2\" class=\"followingBallsG\"></div><div id=\"followingBallsG_3\" class=\"followingBallsG\"></div><div id=\"followingBallsG_4\" class=\"followingBallsG\"></div></div>');
            var j = $(this).attr('projectid');
            $.ajax({
                url: 'addNewProject.php?id=' + j ,
                success: function(data,status) {
                    $('#main-body-container').html(data);
                }
            });
        });
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
.sol-content
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
<div class="columns large-9 small-12">
    <div class="row">
        <div class="columns large-7">
            <div class="columns large-12">
                <div class="sol-title">
                    <?php
                        $projectVariable = new Project($_GET['id']);
                    $projectVariable->getProject($_GET['id']);
                    $teamAdmin = $projectVariable->getRealAdmin($_GET['id']) ;
                    echo $projectVariable->title;
                    ?>
                </div>
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
                </span>
            </div>
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
    if($teamAdmin == $user->id)
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
    <div class="columns large-3 right">
        <?php
            echo "<button projectid='".$_GET['id']."' class='form-button' id='editProjectButton'>Edit Project</button>";
        ?>
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