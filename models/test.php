<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 19-Jan-18
 * Time: 12:04
 */
require_once '../Config.php';

$conn = connection::createConnection();
$query = "SELECT * FROM post";
mysql_set_charset("UTF8");
header('Content-type: text/html; charset=utf-8');
$conn->set_charset('UTF8');
$result = $conn->query($query);
if (!$result) {
    throw new Exception("Database Error ");
}
while ($row = $result->fetch_assoc()) {
    $r[] = $row;
}
echo json_encode($r);