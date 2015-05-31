<?php
    require_once 'include/php/connect.php';
    require 'sessionCheck.php';
    require_once 'AllClass.php';
    $allObj = new All;
?>

<style type="text/css">
  .dropdown
  {
    background-color: white;
  font-family: inherit;
  border: 1px solid #cccccc;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  color: rgba(0, 0, 0, 0.75);
  display: block;
  font-size: 0.875em;
  margin: 0 0 1em 0;
  padding: 0.5em;
  height: 2.3125em;
  width: 100%;

  }
  .tags
  {
    height: 2.5125em !important;
  }
  .teambubble-list
  {
    padding-left: 10px;
    display: inline-block;
    list-style-type: none;
  }
  .teambubble
  {
    display: inline-block;
    float: left !important;
    margin:10px;
    padding: 5px;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    background: #3b98a7;
    border-bottom: solid 2px #286973;
    color: #fff;
  }
  .teambubble-admin
  {
    display: inline-block;
    float: left !important;
    margin:10px;
    padding: 5px;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    background: #da4600;
    border-bottom: solid 2px #a63400;
    color: #fff;
  }
</style>

<div class="body-header">My Projects</div><br>
  <?php
    $result = $GLOBALS['db']->raw("SELECT u.*, p.* FROM user_project u INNER JOIN projects p ON u.ProjectId = p.ProjectId WHERE u.UserId=".$curUserId);
    echo "<div class='issues-container'>";
    while($row = $result->fetch_assoc())
    {
        echo "<div class='issues-header''>".$row["Title"]."</div>";
        echo "<div class='challenges-container'>".$row["Abstract"]."</div>";
//        echo "<div class='issues-header''>"."Team"."</div>";
        $result2 = $GLOBALS['db']->raw("SELECT u.*, p.* FROM user_project u INNER JOIN users p ON u.UserId = p.UserId WHERE u.ProjectId='".$row["ProjectId"]."'");
        echo "<ul class='teambubble-list'>";
        while($row2 = $result2->fetch_assoc())
        {
          if($row2["Status"] == 0)
          {
            echo "<li class='teambubble-admin'>".$row2["Name"]." (Team Leader)</li>";
          }
          else
          {
             echo "<li class='teambubble'>".$row2["Name"]."</li>";
          }
        }
        echo "</ul>";
    }
  ?>
</div>