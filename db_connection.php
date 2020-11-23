<?php 
function OpenCon()
{
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $db="homedecor";
    
    $conn= new mysqli($dbhost,$dbuser,$dbpass,$db)or die("connect failed:%s\n".$conn->error);
    return $conn;
}
function CloseCon($conn)
{
    $conn->close();
}
?>