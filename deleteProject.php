<?php
    require_once 'include/php/connect.php';
    require_once 'ProjectClass.php';
    require_once 'sessionCheck.php';

    if(isset($_POST['id'])) {
        $project = new Project($_POST['id']);
        $row = $project->getTeamAdmin($_POST['id'], $curUserId);
        if($row['Status'] == 0) {
            $GLOBALS['db']->raw('DELETE FROM projects WHERE ProjectId="' . $_POST['id'] . '"');
            $result = $GLOBALS['db']->affected_rows();
            if($result) {
                echo 'Success';
            } else {
                echo 'Failed';
            }
        } else {
            echo 'Failed';
        }
    } else {
        echo 'Failed';
    }