<?php
    if (isset($_GET['challengeId'],$_GET['mode'])) {
        if ($_GET['mode']== 'add_comment' && isset($_GET['comment'])) {
            echo " Adding Comment for Challenge :".$_GET['challengeId']." Comment is :".$_GET['comment'];
        } else if ($_GET['mode']== 'delete_comment' && isset($_GET['commentId'])) {
            echo " Deleting Comment for Challenge :".$_GET['challengeId']." Comment is :".$_GET['commentId'];
        }
    } else if (isset($_GET['challengeId'])) {
	    echo " Viewing Comments";
    }