<?php

require_once 'dbConnection.php';

function getName(){
    $id = $_POST['id'];
    $sql="select first_name from clerk where clerk_id='$id'";
    $rst = mysql_query($sql);

    if ($rst!=false){
        $row = mysql_fetch_array($rst);
        echo "$row[first_name]";
    }else{
        echo "wrong";
    }
}

$action = $_POST['action'];
//$action='getAllStudents';
if ($action=='getName'){
    getName();
}
?>