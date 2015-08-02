<?php
    require_once 'include/php/connect.php';
    $result=$GLOBALS['db']->raw('SELECT * FROM users');
    $i=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="IEEE-VIT 2013">
    <meta name="description" content="This is an initiative that provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled.">
    <meta name="keywords" content="Build For A Change, Makeathon, IEEE-VIT, VIT, University, Projects, Students">
    <title>Build For A Change | Registered Users Details</title>
    <!-----------------------------Stylesheets---------------------------->
    <link rel="stylesheet" type="text/css" href="include/css/materialize.css">
    <!-------------------------------------------------------------------->
    <link rel="icon" href="img/favicon.png">
</head>
<body onload="userDetails.password.focus()">
<?php
    if(!isset($_POST['password']) || (isset($_POST['password']) && $_POST['password'] != 'ieeeclabs')) {
        echo '
            <div class="valign-wrapper" style="height: 100vh; width: 100%; background: #EEEEEE;">
                <div class="valign" style="margin: 0 auto;">
                    <div class="card-panel">
                        <form action="users.php" method="post" name="userDetails">
                            <div class="input-field">
                                <input type="password" id="password" name="password">
                                <label for="password">Password</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ';
    } else if(isset($_POST['password']) && $_POST['password'] == 'ieeeclabs') {
        echo '
            <table class="striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Phone Number</th>
                        <th>College</th>
                        <th>Branch & Year</th>
                    </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . ucwords($row['Name']) . '</td>
                            <td>' . $row['Email'] . '</td>
                            <td>' . $row['Phoneno'] . '</td>
                            <td>' . $row['College'] . '</td>
                            <td>' . $row['Branch'] . '</td>
                        </tr>';
                        $i++;
                    }
                echo '
                </tbody>
            </table>';
    }
?>

<!--------------------------Scripts--------------------------------->
<script src="include/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="include/js/materialize.min.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>