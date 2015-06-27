<?php
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';
    require_once 'AllClass.php';
    $allObj = new All;

    $greeting= array(
        "aloha"=>"Aloha,",
        "ahoy"=>"Ahoy,",
        "bonjour"=>"Bonjour,",
        "gday"=>"Good day,",
        "hello"=>"Hello,",
        "hey"=>"Hey,",
        "hi"=>"Hi,",
        "hola"=>"Hola,",
        "howdy"=>"Howdy,",
        "rawr"=>"Rawr,",
        "salutations"=>"Salutations,",
        "sup"=>"Sup,",
        "whatsup"=>"What's up,",
        "yo"=>"Yo,");

    function randomGreeting() {
        global $greeting;
        global $curUser;
        return ($greeting[array_rand($greeting)] . ' ' . $curUser->name);
    }
?>
<div class="row">
    <div class="col s12">
        <div class="card-panel user-greeting">
            <i class="mdi-action-account-circle"></i>
            <h3>
                <?php echo randomGreeting()?>
            </h3>
        </div>
    </div>
    <div class="col s12">
        <div class="card-panel news-main-header">Latest News</div>
        <?php
            $arrayBig = $allObj->getNews();
            foreach($arrayBig as $temp) {
                echo('
                    <div class="card-panel news-container">
                        <div class="news-header">'
                            . $temp['title'] .
                        '</div>
                        <div class="news-content">'
                            . $temp['desp'] .
                        '</div>
                        <div class="news-time">At ' . $temp['date'] . ' By ' . $temp['by'] . '</div>
                    </div>
                ');
            }
        ?>
    </div>
</div>