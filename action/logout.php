<?php
session_start();
include_once('dbcon.php');

$id =  $_GET['d'];

$updatStatus = "UPDATE users SET status='0' WHERE id = '".$id."'";
$result = $db->query($updatStatus);


if(session_destroy()){
    $location = 'location:../login.php?e=0';
    header($location); 
}