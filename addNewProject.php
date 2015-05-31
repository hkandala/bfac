<?php
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';
require_once 'UserClass.php';
require_once 'AllClass.php';
require "sessionCheck.php";
$allObj = new All;
?>

<script>
    $(document).ready(function(e){
        $("#tagform-editonly" ).find('input.tag').tagedit({
          autocompleteURL: 'team_autocomplete.php',
          allowEdit: false
        });
    });
</script>
<script type="text/javascript">
var validator = new FormValidator('tagform-editonly', [
{
    name: 'title',
    display: 'title',
    rules: 'required'
}, {
    name: 'abstract',
    rules: 'required'
}, {
    name: 'requirement',
    rules: 'required'
}, {
    name: 'whymak',
    rules: 'required'
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

<style type="text/css">
.tagedit-list
{
  display: inline-block !important;
  height: auto;
  min-height: 3em !important;
  padding-top: 3px !important;
}
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
<div class="body-header">Add a Project</div><br>
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
           $teamAdmin = $project->getRealAdmin($_GET['id']) ;
        }
        else
        {
           if(isset($_GET['challengeId']) && !empty($_GET['challengeId']))
           {
                $challengeId = $_GET['challengeId'];
           }
           else
           {
                $challengeId="";
           }
           $title="";
           $team = "";
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
            if(isset($_GET['id']) || isset($_GET['challengeId']))
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
                  $count = $result->num_rows;

          		if($count > 1)
          		{
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
          			echo "<input type='text' value='' class='tag tags' name='tag[]'/>";
          		}
            }
            else
            {
              ?>
            <input type="text" value="" class="tag tags" name="tag[]"/>
            <input type="text" value="" class="tag tags" name="tag[]"/>
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
    }
      ?>

      <div class="columns large-12 small-12"><label class="form-label">Abstract</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" style="min-height:200px" name="abstract" ><?php echo str_replace( '<br />', "\n", $abstract )?></textarea> </div>
      <div class="columns large-12 small-12"><label class="form-label">Requirement</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" style="min-height:200px" name="requirement" ><?php echo str_replace( "<br />", "\n",$requirement);?></textarea> </div>
      <div class="columns large-12 small-12"><label class="form-label">Why Makeathon?</label></div>
      <div class="columns large-12 small-12"><textarea class="form-textarea" style="min-height:200px" name="whymak" ><?php echo str_replace( '<br />', "\n",$whymak);?></textarea> </div>
      <div id="error" class="columns large-12 small-12"></div>
      <div type="button" class="columns large-12 small-12 ">
        <input type="submit"class="form-button " value="Submit" />
      </div>
      <div id="error"></div>
      <?php if(isset($_GET['id']) && !empty($_GET['id'])) echo "<input type='hidden' name='id' value='".$_GET['id']."' />"; ?>
    </form>