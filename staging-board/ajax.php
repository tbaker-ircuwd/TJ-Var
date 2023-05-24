<?php
require_once("/home/shared/functions.php");
require_once("/home/shared/db.php");
$db = new db('material_staging');

extract($_GET);
if(isset($action) && $action != ''){
	switch($action){
		case 'getBoards':
			$sql = "SELECT * FROM boards";
			$results = $db->query($sql);
			print_r(json_encode($results));
			break;
		case 'getBays':
			if(isset($boardID) && $boardID != ''){
				$sql = "SELECT * FROM bays WHERE board_id = '$boardID'";
				$results = $db->query($sql);
				print_r(json_encode($results));
			}else{
				$sql = "SELECT * FROM bays";
                                $results = $db->query($sql);
                                print_r(json_encode($results));
			}
			break;
	}
}else{

}
?>
