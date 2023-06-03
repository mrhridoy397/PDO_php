<?php 
include_once('./db/connection.php');
date_default_timezone_set('Asia/Dhaka');

$dbh = new curd2("localhost","root","","mahmudur_rahman");

if($dbh){
    $sql = 'INSERT INTO `student`(`name`, `email`, `create_at`) VALUES (:name,:email,:create)';
    $stmt = $dbh->conn->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':create',$create);
    // add value
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $create = date('y/m/d h:i:s a', time());
    // execute statement
    $stmt->execute();
    echo "Data insart success";
    header('location:read.php');
}
else{
    echo "something wrong";
}