<?php

$con = mysql_connect("localhost", "root", NULL);
mysql_select_db("ms");

if (!$con) {
    die("Connect fail" . mysqli_connect_error());
}

$uid = $_POST['id'];

$sql = "SELECT * FROM user WHERE id='$uid'";
$rst = mysql_query($sql);

$displayString="";

if ($rst !=false){
    $row = mysql_fetch_array($rst);
    $displayString .= "$row[password]|";
    $displayString .= "$row[role]|";
    echo $displayString;
}else{
    echo'false';
}

?>
