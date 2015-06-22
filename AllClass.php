<?php
require_once 'include/php/connect.php';

class All {
	function getNews() {
		$i=0;
		$arrayBig = array();
		$result = $GLOBALS['db']->raw("SELECT `title` , `by` , `desp` , DATE_FORMAT( `date` , '%h:%i %p' ) FROM news");
		while($row = $result->fetch_assoc()) {
			$arraySmall['title']=$row['title'];
			$arraySmall['desp']=$row['desp'];
			$arraySmall['by']=$row['by'];
			$arraySmall['date']=$row["DATE_FORMAT( `date` , '%h:%i %p' )"];
			array_push($arrayBig, $arraySmall);
			$i++;
			if($i==4) {
				break;
			}
		}
		return $arrayBig;
	}

	function getIssues() {
		$arrayBig = array();
		$result = $GLOBALS['db']->raw("SELECT * FROM issues");
		while($row = $result->fetch_assoc()) {
			$arraySmall['id']=$row['Id'];
			$arraySmall['title']=$row['Title'];
			$arraySmall['summary']=$row['Summary'];
			$arraySmall['image']=$row['Image'];
			array_push($arrayBig, $arraySmall);
		}
		return $arrayBig;
	}
}