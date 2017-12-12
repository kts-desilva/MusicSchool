<?php

require_once 'dbConnection.php';

function getName(){
    $id = $_POST['id'];
    $sql="select first_name from teacher where teacher_id='$id'";
    $rst = mysql_query($sql);

    if ($rst!=false){
        $row = mysql_fetch_array($rst);
        echo "$row[first_name]";
    }else{
        echo "wrong";
    }
}

function getAll(){
    $id = $_POST['id'];
    //$id = 'T001';
    $sql="select * from teacher where teacher_id='$id'";
    $rst = mysql_query($sql);
    //echo $rst;
    $data='';
    if ($rst!=false){
        $row = mysql_fetch_array($rst);
        $data.="$row[first_name]"."|";
        $data.="$row[last_name]"."|";
        $data.="$row[address]"."|";
        $data.="$row[email]"."|";
        $data.="$row[phone_no]";

        echo "$data";

    }else{
        echo "wrong";
    }
}

function update(){
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];

    /*$id = 'T001';
    $first_name = 'Tim';
    $last_name = 'Laymanjhkumj';
    $address = '75, New road, Colombo07,80300';
    $email ='tim@gmail.com';
    $phone_no = '0715555621';*/

    $sql="update teacher set first_name='$first_name' , last_name='$last_name' , address='$address',email='$email', phone_no='$phone_no' where teacher_id='$id'";
    $rst = mysql_query($sql);
    //echo $rst;
    if ($rst){
        echo 'ok';
    }else{
        echo 'wrong';
    }
}

function getModules(){
    $id = $_POST['id'];
    $id = 'T001';
    $sql="select class_id,course_id,course_name,day,start_hr,start_min,end_hr,end_min,venue,class_type from teacher natural join teaches natural join course natural join class where teacher.teacher_id='$id'";
    $rst = mysql_query($sql);
    echo $rst;
    $data='';
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $data.="<tr>";
            $data.="<td>$row[course_id]</td>";
            $data.="<td>$row[course_name]</td>";
            $data.="<td>$row[day]</td>";
            $data.="<td>$row[start_hr] : $row[start_min]</td>";
            $data.="<td>$row[end_hr] : $row[end_min]</td>";
            $data.="<td>$row[venue]</td>";
            $data.="<td>$row[class_type]</td>";
            $data.="<td><button class='btn btn-info btn-fill btn-block' data-toggle='modal' data-target='#myModal' id='$row[class_id]'>View Class</button></td>";
            $data.="</tr>";
        }
        echo "$data";

    }else{
        echo "wrong";
    }
}

function getClass(){
    $id = $_POST['id'];
    //$id = 'T001';
    $sql="select student_id,first_name,last_name from student natural join takes where takes.class_id='$id'";
    $rst = mysql_query($sql);
    //echo $rst;
    $data='';
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $data.="<tr>";
            $data.="<td>$row[student_id]</td>";
            $data.="<td>$row[first_name] $row[last_name]</td>";
            $data.="</tr>";
        }
        echo "$data";

    }else{
        echo "wrong";
    }
}

function getClassGradesTemp(){
    $id = $_POST['id'];
    //$id = 'T001';
    $sql="select student_id,first_name,last_name from student natural join takes where takes.class_id='$id'";
    $rst = mysql_query($sql);
    //echo $rst;
    $data='';
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $data.="<tr class='item'>";
            $data.="<td>$row[student_id]</td>";
            $data.="<td>$row[first_name] $row[last_name]</td>";
            $data.="<td> <select class='form-control' style='width: 100px'> <option>A</option><option>B</option><option>C</option> </select></td>";
            $data.="</tr>";
        }
        echo "$data";

    }else{
        echo "wrong";
    }
}

function getModuleNames(){
    $id = $_POST['id'];
    //$id = 'T001';
    $sql="select class_id,course_id,course_name,class_type from teacher natural join teaches natural join course natural join class where teacher.teacher_id='$id'";
    $rst = mysql_query($sql);
    //echo $rst;
    $data='';
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $data.="<option id='$row[class_id]' name='$row[course_id]'>$row[course_id]-$row[course_name]-$row[class_type]</option>";
        }
        echo "$data";

    }else{
        echo "wrong";
    }
}

function addGrades(){
    $courseID = $_POST['courseID'];
    $sid = $_POST['sid'];
    $grade = $_POST['grade'];

    $sql="insert into result(description,student_id,course_id) values ('$grade','$sid','$courseID')";
    $rst = mysql_query($sql);
    //echo $rst;
    if ($rst){
        echo 'ok';
    }else{
        echo 'wrong';
    }
}

function getProgress($student_id,$course_id){
    $sql="select description from result where student_id='$student_id' and course_id='$course_id'";
    $rst=mysql_query($sql);
    $prog=0;
    $tot=0;
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $grade=$row["description"];
            if($grade=='A'){
                $prog=$prog+85;
            }elseif($grade=='B'){
                $prog=$prog+60;
            }elseif($grade=='C'){
                $prog=$prog+40;
            }
            $tot=$tot+1;
        }
        if ($tot==0){
            return 0;
        }
        return  ($prog/($tot*100))*100;
    }else{
        return 0;
    }
}

function getAllStudents(){
    $id = $_POST['id'];
    //$id = 'T001';
    $sql="select class_id,course_id,course_name,class_type from teacher natural join teaches natural join course natural join class where teacher.teacher_id='$id'";
    $rst = mysql_query($sql);
    $data='';
    if ($rst!=false){
        while ($row = mysql_fetch_array($rst)) {
            $sql2="select student_id,first_name,last_name from student natural join takes where class_id='$row[class_id]'";
            $rst2 = mysql_query($sql2);
            if($rst2){
                while ($row2 = mysql_fetch_array($rst2)) {
                    $prog=getProgress($row2["student_id"],$row["course_id"]);
                    $data.="<tr><td>$row2[student_id]</td><td>$row2[first_name] $row2[last_name]</td><td>$row[course_id]</td><td>$row[course_name]</td><td>$prog</td><td>";
                    $data.="<div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='$prog' aria-valuemin='0' aria-valuemax='100' style='width:$prog%'>$prog %</div></div></td>";
                    $data.="<td><button class='btn btn-info btn-fill btn-block '>Generate Report</button></td></tr>";
                }
            }

        }
        echo "$data";

    }else{
        echo "wrong";
    }

}

function getStudentGrades(){
    $id = $_POST['id'];
    $module_id=$_POST['module_id'];
    $module_type=$_POST['module_type'];
    $module_name=$_POST['module_name'];
    $data='';
    if ($id==""){
        $sql="select class_id from class where course_id='$module_id' and class_type='$module_type'";
        $rst = mysql_query($sql);
        $row = mysql_fetch_array($rst);

        $sql2="select student_id,first_name,last_name from student natural join takes where class_id='$row[class_id]'";
        $rst2 = mysql_query($sql2);
        if($rst2){
        $n=mysql_num_rows($rst2);
            while ($row2 = mysql_fetch_array($rst2)) {
                $prog=getProgress($row2["student_id"],$module_id);
                $data.="<tr><td>$row2[student_id]</td><td>$row2[first_name] $row2[last_name]</td><td>$module_id</td><td>$module_name</td><td>$prog</td><td>";
                $data.="<div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='$prog' aria-valuemin='0' aria-valuemax='100' style='width:$prog%'>$prog %</div></div></td>";
                $data.="<td><button class='btn btn-info btn-fill btn-block '>Generate Report</button></td></tr>";
            }
            echo $data;
        }else{
            echo 'wrong';
        }
    }
}

$action = $_POST['action'];
//$action='getStudentGrades';
if ($action=='getName'){
    getName();
}elseif($action=='getAll'){
    getAll();
}elseif($action=='update'){
    update();
}elseif($action=='getModules'){
    getModules();
}elseif($action=='getClass'){
    getClass();
}elseif($action=='getModuleNames'){
    getModuleNames();
}elseif($action=='getClassGradesTemp'){
    getClassGradesTemp();
}elseif($action=='addGrades'){
     addGrades();
}elseif($action=='getProgress'){
    getProgress('S001','C001');
}elseif($action=='getAllStudents'){
    getAllStudents();
}elseif($action=='getStudentGrades'){
    getStudentGrades();
}

?>
