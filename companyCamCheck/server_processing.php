<?php
require_once('/home/shared/db.php');
$conn = new db('companyCam','intapps');
$query = $conn->query("SELECT count(id) FROM receivedWebhooks");
$totalRecords = $query[0];

$length = $_GET['length'];
$start = $_GET['start'];

$sql = "SELECT * FROM receivedWebhooks";
$sqlCount = "SELECT COUNT(*) as count FROM receivedWebhooks";

if (isset($_GET['search']) && !empty($_GET['search']['value'])) {
    $search = $_GET['search']['value'];
    $sql .= " WHERE companyCode like '%$search%' OR type like '%$search%'";
    $sqlCount .= " WHERE companyCode like '%$search%' OR type like '%$search%'";
}

$query = $conn->query($sqlCount);
$totalRecords = $query[0]['count'];

if(isset($_GET['order'][0]['column'])){
	$column = $_GET['order'][0]['column'];
	switch($column){
		case'0':
			$column = 'id';
			break;
		case'1':
			$column = 'type';
			break;
		case'2':
			$column = 'companyCode';
			break;
		case'3':
			$column = 'message';
			break;
		case'4':
			$column = 'actionComplete';
			break;
		case'5':
			$column = 'completedAction';
			break;
		case'6':
			$column = 'receivedTimestamp';
			break;
		case'7':
			$column = 'processedTimestamp';
			break;
	}
	$direction = $_GET['order'][0]['dir'];
	$sql .= " ORDER BY $column $direction";
}
$length = $_GET['length'];
$start = $_GET['start'];

$sql .= " LIMIT $start, $length";


$query = $conn->query($sql);
$result = [];
foreach($query as $row) {
    $result[] = [
	$row['id'],
	$row['type'],
        $row['companyCode'],
        $row['message'],
	$row['actionComplete'],
	$row['completedAction'],
	date("m/d/y h:i:s",$row['receivedTimestamp']),
	date("m/d/y h:i:s",$row['processedTimestamp'])
    ];
}

echo json_encode([
    'draw' => $_GET['draw'],
    'recordsTotal' => $totalRecords,
    'recordsFiltered' => $totalRecords,
    'data' => $result,
    'sql' => $sql
]);
