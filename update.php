<?php 
include_once('./db/connection.php');
date_default_timezone_set('Asia/Dhaka');

$dbh = new curd2("localhost","root","","mahmudur_rahman");

if($dbh){
    $sql = 'UPDATE  `student` SET`name`= :name, `email`= :email WHERE `id` = :id';
    $stmt = $dbh->conn->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':id',$id);
    // add value
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $id = $_REQUEST['id'];
    // execute statement
    $stmt->execute();
    echo "Data update success";
    header('location:read.php');
}
else{
    echo "something wrong";
}