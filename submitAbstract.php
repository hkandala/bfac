<?php
    require_once 'include/php/connect.php';
    require_once 'ProjectClass.php';
    require 'sessionCheck.php';
    session_regenerate_id();

    if(isset($_POST['title']) && isset($_POST['abstract']) && isset($_POST['whymak']) && !empty($_POST['title']) && !empty($_POST['abstract']) && !empty($_POST['whymak'])) {
        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
        if(empty($_POST['requirement'])) {
            $requirement = "None";
        } else {
            $requirement = $_POST['requirement'];
        }
        $whymak = $_POST['whymak'];
        $challengeId = $_POST['challenge'];
        $emails= array();
        if(isset($_POST['tag'])) {
            $tags = $_POST['tag'];
            foreach ($tags as $key) {
                $temp = explode('(', $key);
                $temp_ex = explode(')', $temp[1]);
                if($curUser->email != $temp_ex[0] && $GLOBALS['db']->select('*','users','Email',"$temp_ex[0]") && $temp_ex[0] != '')
                    array_push($emails, $temp_ex[0]);
            }
        }
        if(isset($_POST['id'])) {
            $project = new Project($_POST['id']);
            $project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
            $project->updateProject();
            $result = $GLOBALS['db']->raw("SELECT * FROM user_project WHERE ProjectId='".$_POST['id']."'");
            $emailsChecked = array();
            while ($row = $result->fetch_assoc()) {
                $user = new User;
                $user->getUser($row['UserId']);
                if(!in_array($user->email, $emails)) {
                    if($row['Status']!=0) {
                        $user->deleteUserFromProject($_POST['id']);
                    } else {
                        array_push($emailsChecked, $user->email);
                    }
                } else {
                    array_push($emailsChecked, $user->email);
                }
            }
            $emailsRemaining = array_diff($emails, $emailsChecked);
            foreach ($emailsRemaining as $emailid) {
                $member = new User;
                $member->getUserFromUserName($emailid);
                $member->addProject(session_id(), 1);
            }
            echo 'Project Successfully Updated!';
        } else {
            $project = new Project(session_id());
            $project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
            $project->insertProject();
            $curUser->addProject(session_id(), 0);
            foreach ($emails as $emailid) {
                $member = new User;
                $member->getUserFromUserName($emailid);
                $member->addProject(session_id(), 1);
            }
            echo 'Project Successfully Created!';
        }
    } else {
        echo 'Something wrong happened, Please try again';
    }