<?php
$_TESTCLIENT = 9;
ob_start();
require_once('/home/scripts/companycam/createProjects.php');
$result = ob_get_contents();
ob_end_clean();
print_r(json_encode($result));
$db2 = new db('test_logging','intapps');
$now = date("Y-m-d H:i:s");
$query = "INSERT INTO logs SET `datetime` = '{$now}', `result` = '{$result}'";
$db2->query($query);
