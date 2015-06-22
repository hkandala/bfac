<?php
    require_once 'UserClass.php';
    require_once 'ThreadClass.php';
    session_start();
    if (!isset($_SESSION['curUser'])) {
	    header("Location index.php");
    }
    $curUserId = $_SESSION['curUser'];
    $curUser = new User;
    $curUser->getUser($curUserId);
    print_r($curUser);
    $projectArr = $curUser->getProjectIds();
    $temp["projects"] = $projectArr;
    error_log("Projects :".json_encode($temp),0);
?>
<div>
	<?php
	    foreach( $projectArr as $projectId) {
		    $project = new Project($projectId);
		    $project->getProject($projectId);
		    $title = $project->getTitle();
		    $id = $project->getId();
    ?>
    <button onclick="loadProjectDetails('<?php echo $id ?>')"><?php echo $title ?></button>
    <?php
        $threads[] = new Thread;
        $threads = $project->getThreads();
        //Todo: Thread Count has to be rectified
        if(count($threads)>0) {
            foreach($threads as $thread) {
                $name = $thread->getLabel();
                if($name != null) {
                    echo "<span>".$name."</span>&nbsp&nbsp";
                }
            }
            echo "<br>";
        }

    }
    ?>
</div>