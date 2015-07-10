<?php
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';
?>

<div class="row">
    <div class="col s12 projects-wrapper">
        <div class="card-panel projects-main-header"><i class="mdi-av-my-library-books"></i> My Projects</div>

    <?php
        $result = $GLOBALS['db']->raw("SELECT u.*, p.* FROM user_project u INNER JOIN projects p ON u.ProjectId = p.ProjectId WHERE u.UserId=".$curUserId);
        echo '<ul class="collapsible" data-collapsible="expandable">';
        $n= $result->num_rows;
        if($n != 0) {
            while($row = $result->fetch_assoc()) {
                $challenge = $GLOBALS['db']->raw('SELECT * FROM challenges WHERE Id="' . $row['ChallengeId'] . '"');
                $challengeStatement = $challenge->fetch_assoc();
                echo ('
                <li>
                    <div class="collapsible-header">' . $row["Title"] . '</div>
                    <div class="collapsible-body">
                        <h3>Abstract</h3>
                        <div class="abstract">'. $row["Abstract"] .'</div>
                        <h3>Challenge</h3>
                        <div class="challenge">'. $challengeStatement['Statement'] .'</div>
                        <h3>Requirements</h3>
                        <div class="req">'. $row["Requirement"] .'</div>
                        <h3>Why Makeathon?</h3>
                        <div class="whymakeathon">'. $row["WhyMakeathon"] .'</div>
            ');
                $result2 = $GLOBALS['db']->raw("SELECT u.*, p.* FROM user_project u INNER JOIN users p ON u.UserId = p.UserId WHERE u.ProjectId='".$row["ProjectId"]."'");
                echo('
                <h3>Team Members</h3>
                <div class="team">
            ');
                while($row2 = $result2->fetch_assoc()) {
                    if($row2["Status"] == 0) {
                        echo "<div class='team-member'>".$row2["Name"]." (Team Leader)</div>";
                    } else {
                        echo "<div class='team-member'>".$row2["Name"]."</div>";
                    }
                }
                echo('
                            </div>
                        </div>
                    </li>
            ');
            }
        } else {
            echo('
                <div class="no-projects">
                    <h4>Oops! You don\'t have any projects.</h4>
                    <h5><span>Add a new project</span> now.</h5>
                </div>
            ');
        }
        echo '</ul>';
    ?>

    </div>
</div>