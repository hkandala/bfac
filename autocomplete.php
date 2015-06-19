<?php
require_once './include/php/connect.php';

$res = $GLOBALS['db']->raw("SELECT * FROM threads");
$autocompletiondata = array();

while($row=$res->fetch_assoc()) {
	$autocompletiondata[$row['ThreadId']] = $row['Label']; 
}

if(isset($_GET['term'])) {
    $result = array();
    foreach($autocompletiondata as $key => $value) {
        if(strlen($_GET['term']) == 0 || strpos(strtolower($value), strtolower($_GET['term'])) !== false) {
            $result[] = '{"id":"'.$key.'","label":"'.$value.'","value":"'.$value.'"}';
        }
    }
    
    echo "[".implode(',', $result)."]";
}