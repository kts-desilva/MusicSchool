<?php
require_once("dbConnection.php");

function getNewID(){
    $sql="SELECT pay_id from teacher_payment order by teacher_id desc limit 1";
    $rst=mysql_query($sql);
    if(mysql_num_rows($rst)==0){
        return 'P001';
    }else{
        $row = mysql_fetch_array($rst);
        $str=$row["pay_id"];
        $n = substr($str,1);
        $nn=(int)$n+1;
        $sn='';
        if($nn<10){
            $sn='P00'.(string)$nn;
        }elseif($nn<100){
           $sn='P0'.(string)$nn;
        }else{
           $sn='P'.(string)$nn;
        }
        return $sn;
    }
}

function addPayment(){
    $basic=$_POST['basic'];
    $deduction=$_POST['deduction'];
    $bonus = $_POST['bonus'];
    $dates = $_POST['dates'];
    $teacherId = $_POST['teacherId'];

    $date1 = strtotime($dates);
    $month = date("m", $date1);
    $year = date("Y", $date1);


    $query_check = "SELECT * FROM teacher WHERE teacher_id ='$teacherId' ";
    $result = mysql_query($query_check);
     if ($result!=false) {
        if($bonus!=null){

            if (is_numeric($bonus)){
                $check="SELECT * FROM teacher_payment WHERE teacher_id ='$teacherId' && month='$month' && year='$year'  ";
                $result = mysql_query($check);
                if (mysql_num_rows($result) != 1) {
                    $salary=(float)$basic+(float)$bonus-(float)$deduction;
                    $pid=getNewID();
                    $query_store = "INSERT INTO teacher_payment values ('$pid','$teacherId','$month','$year',$deduction,$bonus,$salary)";
                    $save = mysql_query($query_store);
                    echo ('Successfully added payment details!');
                }

           }else{
                echo('Payment Details are already added!!!');
           }

        }else{
            echo ('Invalid value for bonus!');
        }
     }else{
        echo ('Invalid ID!');
     }
}


function idValidate(){
    $idInput = $_POST['idInput'];
    $query_check = "SELECT teacher_id FROM teacher WHERE teacher_id ='$idInput' ";
    $result = mysql_query($query_check);
    if (mysql_num_rows($result) == 1) {
            echo 'ok';
    }else{
        echo 'false';
    }
}

function getBasic(){
    $idInput = $_POST['id'];
    $query_check = "SELECT basic_salary FROM teacher WHERE teacher_id ='$idInput' ";
    $result = mysql_query($query_check);
    //echo mysql_num_rows($result);
    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_array($result);
        echo $row["basic_salary"];
    }
}

function getDeduction($tid,$month,$year){
    $query="SELECT COUNT(teacher_id) FROM teacher_attendance WHERE MONTH(check_in_date) = $month AND YEAR(check_in_date) = $year";
    $data = mysql_query($query);
    $payDays = mysql_fetch_array($data);
    $pd=$payDays["count(teacher_id)"];
    $deductAmount=0;
      if ($pd<17) {
      		$deductDays=17-$pd;
      		$deductAmount=500 * $deductDays;
      }
      else{
      	$deductDays=0;
      	$deductAmount=0;
      }
      echo '$deductAmount';
}

function updatePayment(){
    $upBasic = $_POST['upBasic'];
    $upDeduction = $_POST['upDeduction'];
    $upBonus = $_POST['upBonus'];
    $upDates = $_POST['upDates'];
    $upteacherId = $_POST['upteacherId'];

    $date1 = strtotime($upDates);
    $month = date("m", $date1);
    $year = date("Y", $date1);
    if (is_numeric($upBonus)){
            $upSalary=(float)$basic+(float)$bonus-(float)$deduction;
            $query="UPDATE teacher_payment SET increment='$upBonus',pay_amount='$upSalary' WHERE teacher_id='$upteacherId' AND month='$month' AND year='$year'";
            runQuery($query);
    }
    else{
        echo "Invalid value for basic salary!!!";
    }
}

/*$val=getNewID();
echo $val;*/

$action = $_POST['action'];
//$action='update';
if ($action=='addPayment'){
    addPayment();
}elseif($action=='idValidate'){
    idValidate();
}elseif($action=='updatePayment'){
    updatePayment();
}elseif($action=='getBasic'){
     getBasic();
}

?>

