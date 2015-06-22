<?php
    require_once 'include/php/connect.php';
    require_once 'AllClass.php';
    $allObj = new All;
?>
<div class="row">
    <div class="col s12">
        <div class="challenges-wrapper">
            <div class="card-panel challenges-header">
                <h2><i class="mdi-action-extension"></i> &nbsp;Challenges</h2>
                <p>Click on the challenges inside the issues to visit the forums and ask your doubts.</p>
            </div>

            <ul class="collapsible" data-collapsible="expandable">

<?php
    $arrayBig = $allObj->getIssues();
    foreach($arrayBig as $temp) {
      	echo ('
      	    <li>
                <div class="collapsible-header">'
                    . $temp['title'] .
                '</div>
                <div class="collapsible-body">
      	');

        $result = $GLOBALS['db']->raw("SELECT * FROM challenge_issue WHERE IssueId=".$temp['id']);

        while($row = $result->fetch_assoc()) {
      		$subresult = $GLOBALS['db']->raw("SELECT * FROM challenges WHERE Id=".$row['ChallengeId']);
      		while ($subrow = $subresult->fetch_assoc()) {
                echo '<div class="challenges-container card-panel"><a href ="forum.php?challengeId=' . $subrow['Id'] . '" >' . $subrow['Statement'] . '</a></div>';
      		}
        }

        echo ('
                </div>
            </li>
        ');
    }
?>

            </ul>
        </div>
    </div>
</div>