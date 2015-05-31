<?php
    require_once 'include/php/connect.php';
    require_once 'AllClass.php';
    $allObj = new All;
?>

    <div class="hide-for-medium-down quote">
          <div class='quote-heading'>It is not enough to be busy<br>we must ask 'what are we busy about?'</div>
          <div class="quote-by">-David Henry Thoreau</div>
    </div>
    <br/><br/>

    <div class="body-header">Challenges</div><br>
    <div class="body-text">Click on the challenges to Visit the Forums and ask your doubts.</div><br>
      <?php
      	$arrayBig = $allObj->getIssues();

      	foreach($arrayBig as $temp)
      	{
      	?>
      		<div class="issues-container">
      		<div class="issues-header">
              <?php echo $temp['title'] ?>
            </div>
        <?php
        	$result = $GLOBALS['db']->raw("SELECT * FROM challenge_issue WHERE IssueId=".$temp['id']);
        	//print_r($temp['id']);
      	while($row = $result->fetch_assoc())
      	{

      		$subresult = $GLOBALS['db']->raw("SELECT * FROM challenges WHERE Id=".$row['ChallengeId']);
      		while ($subrow = $subresult->fetch_assoc())
      		{
      			?>

      			<?php
      			    if(isset($_SESSION['curUser']))
      			        echo "<div class='challenges-container-2'><a href ='forum.php?challengeId=".$subrow['Id']."' style='color:#808080;'>".$subrow['Statement']."</a></div>";
      			    else
                {
      			         echo "<div class='challenges-container-2'><a href ='forum.php?challengeId=".$subrow['Id']."' style='color:#808080;'>".$subrow['Statement']."</a></div>";
                }
      			?>


        <?php
      		}
      	   }
      	   echo "</div><br />";
         }
        ?>

        <br>