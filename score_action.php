<?php
  if (!isset($_SESSION['member_id'])) {
    exit() ;
  }

  include("../includes/db_connect.php");
  $con = connect();


if (isset($_POST['score_action'])) {

 
  $patient_name = clean_str($_POST['patient_name']);
 

  $sql = ("INSERT INTO `tbl_book`(`add_date`, `patient_name`, `patient_cradnumber`, `patient_hn`, `patient_phone`, `rights`, `admit_date`, `doctor_name`, `requester_name`, `notes` ) 
            VALUES ('$add_date', '$patient_name', '$patient_cradnumber', '$patient_hn', '$patient_phone', '$rights', '$admit_date', '$doctor_name', '$requester_name' , '$notes' ) ");
    $r = $con->query($sql) or die ($sql) ; 

    if ($r) {

      echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
      echo "<script> window.location='?page=q_book'; </script>";
    
    } else {
      echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
      echo "<script> window.location='?page=q_book'; </script>";
      } 

  }
  mysqli_close($con);
?>


