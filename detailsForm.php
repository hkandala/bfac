<?php
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';
    $pageName = 'detailsForm.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="IEEE-VIT 2013">
    <meta name="description" content="This is an initiative that provides engineers with tools to create, ideate and prototype for socially assistive causes, in turn helping schools for the differently abled.">
    <meta name="keywords" content="Build For A Change, Makeathon, IEEE-VIT, VIT, University, Projects, Students">
    <title>Build For A Change | Desk</title>
    <link rel="icon" href="img/favicon.png">
    <!-----------------------------Stylesheets---------------------------->
    <link rel="stylesheet" type="text/css" href="include/css/styles.css">
    <!-------------------------------------------------------------------->
    <script src="include/js/init.js" type="text/javascript"></script>
</head>
<body>
<?php
    require_once "header.php";
?>

<div class="form-container card-panel">
    <h2>A few more details that we need...</h2>
    <form class="details-form" action="detailsFormCheck.php" method="post">
        <div class="col twelve">
            <div class="input-field">
                <i class="mdi-action-assessment prefix"></i>
                <input type="text" name="no_of_hacks" id="no_of_hacks" class="validate"/>
                <label for="no_of_hacks">Number of hacks you have previously attended</label>
            </div>
        </div>
        <div class="col twelve">
            <div class="input-field">
                <i class="mdi-action-speaker-notes prefix"></i>
                <textarea name="hack_desc" id="hack_desc" class="validate materialize-textarea"></textarea>
                <label for = "hack_desc">Description and role you played for the hacks that you attended</label>
            </div>
        </div>
        <div class="col twelve">
            <div class="input-field">
                <i class="mdi-communication-chat prefix"></i>
                <textarea name="past_proj" id="past_proj" class="validate materialize-textarea"></textarea>
                <label for = "past_proj">Past projects description and your role</label>
            </div>
        </div>
        <div class="col twelve">
            <div class="input-field">
                <i class="mdi-action-announcement prefix"></i>
                <textarea name="ideas" id="ideas" class="validate materialize-textarea"></textarea>
                <label for = "ideas">Your idea for a socially assistive technology</label>
            </div>
        </div>
        <div class="col twelve">
            <div class="input-field">
                <i class="mdi-communication-comment prefix"></i>
                <input type="text" name="spec" id="spec" length="20" class="validate"/>
                <label for = "spec">Specialization ( Web Dev / App Dev / Design etc. )</label>
            </div>
        </div>
        <div class="col twelve">
            <div class="input-field center-align">
                <input type="submit" class="btn-large" value="Submit Details"/>
            </div>
        </div>
    </form>
</div>

<?php
    require_once "footer.php" ;
?>

<!--------------------------Scripts--------------------------------->
<script src="include/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="include/js/materialize.min.js" type="text/javascript"></script>
<script src="include/js/app.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".details-form").submit(function (e) {
            return detailsFormValidate();
        });

        $(".details-form #no_of_hacks").blur(function () {
            if (!hacksValidate()) {
                $(".details-form #no_of_hacks").addClass("invalid").removeClass("valid");
            } else {
                $(".details-form #no_of_hacks").addClass("valid").removeClass("invalid");
            }
        });
        $(".details-form #hack_desc").blur(function () {
            if (!hackDescValidate()) {
                $(".details-form #hack_desc").addClass("invalid").removeClass("valid");
            } else {
                $(".details-form #hack_desc").addClass("valid").removeClass("invalid");
            }
        });
        $(".details-form #past_proj").blur(function () {
            if (!projValidate()) {
                $(".details-form #past_proj").addClass("invalid").removeClass("valid");
            } else {
                $(".details-form #past_proj").addClass("valid").removeClass("invalid");
            }
        });
        $(".details-form #ideas").blur(function () {
            if (!ideasValidate()) {
                $(".details-form #ideas").addClass("invalid").removeClass("valid");
            } else {
                $(".details-form #ideas").addClass("valid").removeClass("invalid");
            }
        });
        $(".details-form #spec").blur(function () {
            if (!specValidate()) {
                $(".details-form #spec").addClass("invalid").removeClass("valid");
            } else {
                $(".details-form #spec").addClass("valid").removeClass("invalid");
            }
        });
    });

    function hacksValidate() {
        var numbers = /[^0-9]/;
        var cont = $(".details-form #no_of_hacks").val();
        return (!numbers.test(cont) && cont.length != 0);
    }

    function hackDescValidate() {
        var content = $(".details-form #hack_desc").val();
        return (content.length > 5);
    }

    function projValidate() {
        var content = $(".details-form #past_proj").val();
        return (content.length > 5);
    }

    function ideasValidate() {
        var content = $(".details-form #ideas").val();
        return (content.length > 5);
    }

    function specValidate() {
        var content = $(".details-form #spec").val();
        return (content.length <= 20 && content.length != 0);
    }

    function detailsFormValidate () {
        if(!hacksValidate()) {
            $(".details-form #no_of_hacks").addClass("invalid").removeClass("valid");
        }
        if(!hackDescValidate()) {
            $(".details-form #hack_desc").addClass("invalid").removeClass("valid");
        }
        if(!projValidate()) {
            $(".details-form #past_proj").addClass("invalid").removeClass("valid");
        }
        if(!ideasValidate()) {
            $(".details-form #ideas").addClass("invalid").removeClass("valid");
        }
        if(!specValidate()) {
            $(".details-form #spec").addClass("invalid").removeClass("valid");
        }

        return (hacksValidate() && hackDescValidate() && projValidate() && ideasValidate() && specValidate());
    }
</script>
<!------------------------------------------------------------------>
</body>
</html>
