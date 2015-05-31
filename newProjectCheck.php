<?php
require_once 'ProjectClass.php';
require_once 'UserClass.php';
require_once 'autocomplete.php';
session_start();
session_regenerate_id(); //Regenerating Session ID for new Projects keeping the session information
if(!isset($_SESSION['curUser']))
{
	header("Location: index.php");
}
$curUserId = $_SESSION['curUser'];
$curUser = new User;
$curUser->getUser($curUserId);

if(isset($_POST['project_title']))
{
	$project = new Project(session_id()); 
	$project->newProject($_POST['project_title']);
	$project->insertProject();
	$curUser->addProject(session_id(),0); //0 stands for Leader
	//

	$result = array('new' => array(), 'deleted' => array(), 'changed' => array(), 'not changed' => array());
    $tags = array_key_exists('tag', $_POST)? $_POST['tag'] : $_POST['formdata']['tags'];

//#@ This part of the code has to be edited	
	foreach($tags as $key => $value) {
        if(preg_match('/([0-9]*)-?(a|d)?$/', $key, $keyparts) === 1) {
            $showResult = true;
            if(isset($keyparts[2])) {
                switch($keyparts[2]) {
                    case 'a':
                        if($autocompletiondata[$keyparts[1]] != $value) {
                            // Items has changed
                            $result['changed'][] = $keyparts[1] . ' (new value: "' . $value . '")';
                        }
                        else {
                            //$result['not changed'][] = $keyparts[1] . ' ("' . $value . '")';
							$result['not changed'][] = $keyparts[1];
                        }
                        break;
                    case 'd':
                        $result['deleted'][] = $keyparts[1] . ' ("' . $value . '")';
                        break;
                }
            }
            else {
                $result['new'][] = $key . ' ("' . $value . '")';
            }
        }
	}
	if($showResult) :
	foreach($result as $key => $results) :
		if(count($results) > 0) :
			foreach($results as $tag):
                $project->addThread($tag);
            endforeach;
        endif;
	endforeach;
endif; 

}
?>
