<?php
include "connection.php";
$studentid = $_POST['studentId'];
$studentname = $_POST['studentName'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$major = $_POST['major'];
$phone = $_POST['phone'];
$studentname_='';
    if($studentid != '') {
        $aSQL = "SELECT * from t_students
        where student_id=$studentid";
        $aQResult=mysqli_query($connect, $aSQL);
        while ($aRow = mysqli_fetch_array($aQResult))
        {
        $studentname_=$aRow["student_name"];
        echo json_encode('username_exist');
        }
    if($studentname_ == NULL) {
        //..............................
        $result2 = mysqli_query($connect,
        "insert into t_students
        set student_id='$studentid',
		student_name='$studentname',
        gender='$gender',
		address='$address',
		major='$major',
		phone='$phone',
		datetime_entry=now() "
        );
        echo json_encode('success');
        //..............................
        }
        $username_=NULL;
    }
    else{
        echo json_encode('data_not_complete');
        }
        $username_=NULL;
?>
