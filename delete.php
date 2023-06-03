<?php 
include_once('./db/connection.php');
date_default_timezone_set('Asia/Dhaka');

$dbh = new curd2("localhost","root","","mahmudur_rahman");

if($dbh){
    $sql = 'DELETE FROM `student` WHERE `id`= :id';
    $stmt = $dbh->conn->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $stmt->execute();
    header('location:read.php');
}
else{
    echo "something wrong";
}