<?php
    require_once 'include/php/connect.php';
    require_once 'ProjectClass.php';
    require_once 'UserClass.php';
    require_once 'sessionCheck.php';

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $project = new Project($_GET['id']);
        $project->getProject($_GET['id']);
        $title = $project->title;
        $challengeId = $project->challengeId;
        $abstract = $project->abstract;
        $requirement = $project->requirement;
        $whymak = $project->whymak;
        $team = $project->getTeamAdmin($_GET['id'], $curUser->id);
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
<script>
    $(document).ready(function(e) {
        $("#abstractForm" ).find('input.tag').tagedit({
          autocompleteURL: 'team_autocomplete.php',
          allowEdit: false
        });
        $("#abstractForm").submit(function(e) {
            e.preventDefault();
            return abstractFormValidate();
        });

        $("#abstractForm #form-title").blur(function () {
            if(!titleValidate()) {
                $("#abstractForm #form-title").addClass("invalid").removeClass("valid");
            } else {
                $("#abstractForm #form-title").addClass("valid").removeClass("invalid");
            }
        });
        $("#abstractForm .select-challenge").click(function () {
            if(!challengeValidate()) {
                $("#abstractForm .select-dropdown").css("border-color", "#F44336");
            } else {
                $("#abstractForm .select-dropdown").css("border-color", "#4CAF50");
            }
        });
        $("#abstractForm .tagedit-list").click(function () {
            $("#abstractForm .select-team-members").css("border-color", "#4CAF50");
        });
        $("#abstractForm #form-abstract").blur(function () {
            if(!abstractValidate()) {
                $("#abstractForm #form-abstract").addClass("invalid").removeClass("valid");
            } else {
                $("#abstractForm #form-abstract").addClass("valid").removeClass("invalid");
            }
        });
        $("#abstractForm #form-requirements").blur(function () {
            $("#abstractForm #form-requirements").addClass("valid").removeClass("invalid");
        });
        $("#abstractForm #form-whymakeathon").blur(function () {
            if(!whyBfacValidate()) {
                $("#abstractForm #form-whymakeathon").addClass("invalid").removeClass("valid");
            } else {
                $("#abstractForm #form-whymakeathon").addClass("valid").removeClass("invalid");
            }
        });

        initModal();
        $("#delete .modal-footer .btn-flat.green").click(function () {
            $("#delete").closeModal();
        });
        <?php
            if(isset($_GET['id']) && $team['Status'] == 0) {
                echo '
                    var projectId = {
                        id: "' . $_GET['id'] . '"
                    };
                    $("#delete .modal-footer .btn-flat.red").off();
                    $("#delete .modal-footer .btn-flat.red").on("click", function () {
                        $.post("deleteProject.php", projectId, function (data) {
                            if(data == "Success") {
                                $("#delete").closeModal();
                                changeTab("EditProject", "editProject.php");
                            } else if (data == "Failed") {
                                $("#delete .modal-footer .feedback").html("Failed, Please, try again later.");
                            } else {
                                $("#delete .modal-footer .feedback").html("Some unknown error occured.");
                            }
                        }).fail(function () {
                            $("#delete .modal-footer .feedback").html("Unable to connect to network.");
                        });
                    });
                ';
            }
        ?>
    });

    function titleValidate() {
        var content = $("#abstractForm #form-title").val();
        return (content.length > 0);
    }
    function challengeValidate() {
        var id = $("#abstractForm #form-challenge").val();
        return id != null;
    }
    function abstractValidate() {
        var content = $("#abstractForm #form-abstract").val();
        return (content.length > 0);
    }
    function whyBfacValidate() {
        var content = $("#abstractForm #form-whymakeathon").val();
        return (content.length > 0);
    }
    function abstractFormValidate () {
        if (!titleValidate()) {
            $("#abstractForm #form-title").addClass("invalid").removeClass("valid");
            $("#abstractForm .feedback").html("Please check all the fields once");
        }
        if (!challengeValidate()) {
            $("#abstractForm .select-dropdown").css("border-color", "#F44336");
            $("#abstractForm .feedback").html("Please check all the fields once");
        }
        $("#abstractForm .select-team-members").css("border-color", "#4CAF50");
        if (!abstractValidate()) {
            $("#abstractForm #form-abstract").addClass("invalid").removeClass("valid");
            $("#abstractForm .feedback").html("Please check all the fields once");
        }
        $("#abstractForm #form-requirements").addClass("valid").removeClass("invalid");
        if (!whyBfacValidate()) {
            $("#abstractForm #form-whymakeathon").addClass("invalid").removeClass("valid");
            $("#abstractForm .feedback").html("Please check all the fields once");
        }

        if(titleValidate() && abstractValidate() && whyBfacValidate() && challengeValidate()) {
            var inputs = $("#abstractForm").serializeArray();
            var abstractObj = {};
            var tagsCount = 0;
            for(var i=0; i<inputs.length; i++) {
                if(inputs[i].name == 'tag[]') {
                    inputs[i].name = 'tag[' + tagsCount +']';
                    tagsCount++;
                }
                abstractObj[inputs[i].name] = inputs[i].value;
            }
            $("#abstractForm .loadingButton .preloader-wrapper").fadeIn('fast');
            $.post('submitAbstract.php', abstractObj, function(response) {
                if(response != '') {
                    $("#abstractForm .loadingButton .preloader-wrapper").fadeOut('fast');
                    $('#abstractForm .feedback').html(response);
                } else {
                    $("#abstractForm .loadingButton .preloader-wrapper").fadeOut('fast');
                    $('#abstractForm .feedback').html('Unknown Error, Please try again');
                }
            }).fail(function() {
                $("#abstractForm .loadingButton .preloader-wrapper").fadeOut('fast');
                $('#abstractForm .feedback').html('Unable to connect to the network');
            });
        }

        return (titleValidate() && abstractValidate() && whyBfacValidate() && challengeValidate());
    }
</script>
<div class="row">
    <div class="col s12">
        <div class="new-project-form-header card-panel"><i class="mdi-av-my-library-add"></i> <?php if(isset($_GET['id']) && !empty($_GET['id'])) { echo 'Edit Project'; if($team['Status'] == 0) { echo '<a class="modal-trigger right btn red" href="#delete" style="font-size: 14px">Delete</a>';} } else { echo 'Add a Project'; }?></div>
    </div>
    <div class="col s12">
        <div class="card-panel new-project-form-wrapper">
            <form id="abstractForm" name="abstractform" action="submitAbstract.php" method="post">
                <?php
                    if(isset($_GET['id']) && !empty($_GET['id'])) {
                        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '" />';
                    }
                ?>
                <div class="input-field col s12">
                    <i class="mdi-action-assignment prefix"></i>
                    <input type = "text" name="title" id="form-title" class="validate" value='<?php echo $title;?>'/>
                    <label <?php if($title!=''){ echo 'class="active"'; }?> for = "form-title">App / Project Title</label>
                </div>
                <div class="input-field col s12 select-challenge">
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
                <?php
                    if(!isset($_GET['id']) || (isset($_GET['id']) && $team['Status'] == 0)) {
                ?>
                <div class="col s12 admin">
                    <div class="col s12">
                        <label class="form-team"><i class="mdi-social-people"></i>&nbsp;&nbsp;Team Members</label>
                    </div>
                    <div class="input-field col s12 select-team-members">
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
                <?php
                        }
                        echo '
                                </div>
                            </div>';
                    } else {
                        $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_GET['id']."'");
                        echo '
                            <div class="col s12 non-admin">
                                <div class="col s12">
                                    <label class="form-team"><i class="mdi-social-people"></i>&nbsp;&nbsp;Team Members</label>
                                </div>
                                <ul class="col s12 team">';
                                while ($row = $result->fetch_assoc()) {
                                    $user = new User;
                                    $user->getUser($row['UserId']);
                                    if($row['Status'] == 0) {
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
                        echo '
                                </ul>
                            </div>';
                    }
                ?>
                <div class="input-field col s12">
                    <i class="mdi-action-description prefix"></i>
                    <textarea name="abstract" id="form-abstract" class="validate materialize-textarea"><?php echo str_replace( '<br />', "\n", $abstract )?></textarea>
                    <label <?php if($abstract!=''){ echo 'class="active"'; }?> for = "form-abstract">Abstract</label>
                </div>
                <div class="input-field col s12">
                    <i class="mdi-action-speaker-notes prefix"></i>
                    <textarea name="requirement" id="form-requirements" class="validate materialize-textarea"><?php echo str_replace( "<br />", "\n",$requirement);?></textarea>
                    <label <?php if($requirement!=''){ echo 'class="active"'; }?> for = "form-requirements">Requirements</label>
                </div>
                <div class="input-field col s12">
                    <i class="mdi-action-announcement prefix"></i>
                    <textarea name="whymak" id="form-whymakeathon" class="validate materialize-textarea"><?php echo str_replace( '<br />', "\n",$whymak);?></textarea>
                    <label <?php if($whymak!=''){ echo 'class="active"'; }?> for = "form-whymakeathon">Why Build For A Change?</label>
                </div>
                <div class="col s12">
                    <div class="loadingButton">
                        <input type="submit" class="btn-large" value="Submit"/>
                        <div class="preloader-wrapper small active">
                            <div class="spinner-layer spinner-green-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                        <p class="feedback"></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>