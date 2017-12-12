<?php

require_once 'dbConnection.php';

function addStudent(){

    $sid =$_POST['sid'];
    $sname =$_POST['sname'];
    $joindate =$_POST['joindate'];

    $contact = $_POST['contact'];
    $about = $_POST['about'];
    $emailid = $_POST['emailid'];
    $address = $_POST['address'];
    $parentname = $_POST['parentname'];
    $parentcontact =$_POST['parentcontact'];
    $parentemail = $_POST['parentemail'];
    $birthday = $_POST['birthday'];

    $remark = $_POST['remark'];
    $fees = $_POST['fees'];
    $advancefees = $_POST['advancefees'];
    $balance = $fees-$advancefees;
    $siblingname =$_POST['siblingname'];
    $siblingid =$_POST['siblingid'];


    $sql = "INSERT INTO student VALUES ('$sid','$sname','$sname','$address','$emailid','M','$birthday')" ;
    $rst=mysql_query($sql);

    $sql2="INSERT INTO fees_trasaction (stdid,paid,submitdate,trasaction) values ('$sid','$advancefees',$joindate,'$remark')";
    $rst2=mysql_query($sql2);

    if ($rst and $rst2){
        echo 'ok';
    }else{
        echo 'wrong';
    }


    /*$sid = $conn->insert_id;

    conn->query("INSERT INTO  fees_transaction (stdid,paid,submitdate,transcation_remark) VALUES ('$sid','$advancefees','$joindate','$remark')") ;

    echo '<script type="text/javascript">window.location="student.php?act=1";</script>';*/


}

$action = $_POST['action'];
//$action='update';
if ($action=='addStudent'){
    addStudent();
}elseif($action=='getAll'){
    getAll();
}

?>