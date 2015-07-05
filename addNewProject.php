<?php
    require_once 'include/php/connect.php';
    require_once 'ProjectClass.php';
    require_once 'UserClass.php';
    require_once 'AllClass.php';
    require_once 'sessionCheck.php';
    $allObj = new All;
?>
<script>
    $(document).ready(function(e){
        $("#form" ).find('input.tag').tagedit({
          autocompleteURL: 'team_autocomplete.php',
          allowEdit: false
        });
    });
</script>
<div class="row">
    <div class="col s12">
        <div class="form-header card-panel"><i class="mdi-av-my-library-add"></i> Add a Project</div>
    </div>
    <div class="col s12">
        <div class="card-panel form-wrapper">
            <form id="form" name="abstractform" action="submitAbstract.php" method="post">
                <?php
                    if(isset($_GET['id']) && !empty($_GET['id'])) {
                       $project = new Project($_GET['id']);
                       $project->getProject($_GET['id']);
                       $title = $project->title;
                       $challengeId = $project->challengeId;
                       $abstract = $project->abstract;
                       $requirement = $project->requirement;
                       $whymak = $project->whymak;
                       $team=$project->getTeamAdmin($_GET['id'],$curUser->id);
                       $teamAdmin = $project->getRealAdmin($_GET['id']) ;
                    } else {
                       if(isset($_GET['challengeId']) && !empty($_GET['challengeId'])) {
                            $challengeId = $_GET['challengeId'];
                       } else {
                            $challengeId="";
                       }
                       $title="";
                       $team = "";
                       $abstract="";
                       $requirement="";
                       $whymak="";
                    }
                ?>
                <div class="input-field col s12">
                    <i class="mdi-action-assignment prefix"></i>
                    <input type = "text" name="title" id="form-title" class="validate" value='<?php echo $title;?>'/>
                    <label for = "form-title">App / Project Title</label>
                </div>
                <div class="input-field col s12">
                    <i class="mdi-action-extension prefix"></i>
                    <select name="challenge" id="form-challenge">
                        <option value="0" disabled
                            <?php
                                if(!isset($_GET['id'])) {
                                    echo "selected";
                                }
                            ?>>             Select a Challenge
                        </option>
                        <?php
                            $result = $GLOBALS['db']->raw("SELECT * FROM challenges");
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <option
                            <?php
                                echo "value='".$row['Id']."'  ";
                                if(isset($_GET['id']) || isset($_GET['challengeId'])) {
                                    if($challengeId == $row['Id'])
                                        echo "selected";
                                }
                            ?>
                        >             <?php echo substr($row['Statement'],0,115)."..." ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col s12 non-admin">
                    <div class="col s12">
                        <label class="form-team">Team Members</label>
                    </div>
                    <!--<ul class="col s12 team">
                        <li>
                            <div class="team-member">Harish Kandala (Team Leader)</div>
                        </li>
                        <li>
                            <div class="team-member">Harish Kandala</div>
                        </li>
                        <li>
                            <div class="team-member">Harish Kandala</div>
                        </li>
                    </ul>-->
                </div>
                    <?php
                        if(!isset($_GET['id']) || (isset($_GET['id']) && $team['Status'] == 0)) {
                    ?>
                    <div class="input-field col s12">
                    <?php
                        if(isset($_GET['id']) && $team['Status'] == 0) {
                            $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
                            $count = $result->num_rows;
                            if($count > 1) {
                                  $i=0;
                                  while ($row = $result->fetch_assoc()) {
                                      $user = new User;
                                      $user->getUser($row['UserId']);
                                      if($curUser->id == $user->id) {
                                          continue;
                                      }
                                      echo '<input type="text" name="tag['.$i.'-a]" value="'.$user->name.' ('.$user->email.')" class="tag"/>';
                                      $i++;
                                  }
                              } else {
                                  echo "<input type='text' value='' class='tag' name='tag[]'/>";
                              }
                        } else {
                    ?>
                        <input type="text" value="" class="tag" name="tag[]"/>
                        <input type="text" value="" class="tag" name="tag[]"/>
                        <input type="text" value="" class="tag" name="tag[]"/>
                    <?php
                        }
                    echo "</div>";
                    } else {
                        $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
                        echo '
                            <div class="col s12 non-admin">
                                <div class="col s12">
                                    <label class="form-team">Team Members</label>
                                </div>
                                <ul class="col s12 team">';
                                while ($row = $result->fetch_assoc()) {
                                    $user = new User;
                                    $user->getUser($row['UserId']);
                                    if($teamAdmin == $user->id) {
                                        echo '
                                            <li>
                                                <div class="team-member">'.$user->name.' (Team Leader)</div>
                                            </li>';
                                    } else {
                                        echo '
                                            <li>
                                                <div class="team-member">'.$user->name.'</div>
                                            </li>';
                                    }
                                }
                        echo "</ul></div>";
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
        <input type="submit" class="form-button " value="Submit" />
      </div>
      <div id="error"></div>
      <?php if(isset($_GET['id']) && !empty($_GET['id'])) echo "<input type='hidden' name='id' value='".$_GET['id']."' />"; ?>
    </form>
        </div>
    </div>
</div>
