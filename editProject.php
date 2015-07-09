<?php
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';
    require_once 'ProjectClass.php';
    require_once 'UserClass.php';
    $projectIds = $curUser->getProjectIds();
    $noOfProjects = count($projectIds);
    $projectTitles = array();
    foreach($projectIds as $projectId) {
        $project = new Project($projectId);
        $project->getProject($projectId);
        array_push($projectTitles, $project->title);
    }
?>
<script type="text/javascript">
    initSelect();
    initNoProjects();
    $(".edit-project-wrapper .select-user-project ul li").click(function() {
        if(this.className == "") {
            var id = $("#userProject").val();
            editProject(id);
        }
    });
    function editProject (id) {
        $("#editUserProject").off();
        $("#editUserProject").on('click', function() {
            $(".desk .content-container").empty();
            $(".desk .preloader-wrapper").removeClass("hide");
            $(".desk .unableToConnect").addClass("hide");
            var address = 'addNewProject.php?id=' + id;
            $.post(address, function(data) {
                $(".desk .preloader-wrapper").addClass("hide");
                $('.desk .content-container').html(data);
                initSelect();
            }).fail(function () {
                $(".desk .preloader-wrapper").addClass("hide");
                $(".desk .unableToConnect").removeClass("hide");
            });
        });
    }
</script>
<div class="row">
    <div class="col s12">
        <div class="edit-project-wrapper">
            <div class="card-panel edit-project-header">
                <h2><i class="mdi-editor-mode-edit"></i> &nbsp;Edit Project</h2>
                <p>Select one of your project to edit or delete.</p>
            </div>
            <div class="card-panel edit-project-form-wrapper clearfix">
                <?php
                    if($noOfProjects>0) {
                        echo '
                            <div class="input-field col l10 s12 select-user-project">
                                <select name = "userProject" id = "userProject">
                                    <option value = "0" selected disabled>Select a Project</option>';
                                    for($i=0; $i<$noOfProjects; $i++) {
                                        echo '
                                            <option value = "' .$projectIds[$i] . '">' . $projectTitles[$i] . '</option>
                                        ';
                                    }
                        echo '
                                </select>
                            </div>
                            <div class="col l2 s12 center-align">
                                <div class="btn-large" id="editUserProject">Go</div>
                            </div>
                        ';
                    } else {
                        echo '
                            <div class="no-projects">
                                <h4>Oops! You don\'t have any projects.</h4>
                                <h5><span>Add a new project</span> now.</h5>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</div>