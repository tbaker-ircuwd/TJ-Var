<?php
preg_match("/iPhone|Android|iPad|iPod|webOS/", $_SERVER['HTTP_USER_AGENT'], $matches);
$os = current($matches);

switch($os){
   case 'iPhone':
   case 'iPad':
   case 'iPod':
	header('Location: itms-apps://itunes.apple.com/app/id1100421418');
	break;
   case 'Android':
	header('Location: market://details?id=com.fleetio.go_app');
	break;
}
?>
