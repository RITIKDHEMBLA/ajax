<?php
$conn=mysqli_connect("localhost","root","","ajax");
// if($conn){
//     echo"connected sucessfully";
// }
$response=[];
$ipl="SELECT * FROM `ajax` WHERE phone='".$_POST['phone']."' or email='".$_POST['email']."'";
$ipl2=mysqli_query($conn,$ipl);
// $ipl3=mysqli_fetch_assoc($ipl2);
if(mysqli_num_rows($ipl2)==0){



if(isset($_POST['name'])&&($_POST['name']!="") && isset($_POST['phone'])&&($_POST['phone']!="")&& isset($_POST['email'])&&($_POST['email']!="")){
    $qr="INSERT INTO `ajax`( `name`, `phone`, `email`) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."')";
    $sql2=mysqli_query($conn,$qr);
    // header("location:ajax1.php?e=2");
    // echo ("<script LANGUAGE='JavaScript'>
    // window.alert('data submitted successfully');
    // window.location.href='ajax1.php';
    // </script>");

if($sql2){
    $response['success']=true;
}
echo json_encode($response);}}
else
{
    $response['success']=false;
    echo json_encode($response);
    //    header("location:ajax1.php?e=3");
    // echo ("<script LANGUAGE='JavaScript'>
    // window.alert('Email or phone already in use');
    // window.location.href='ajax1.php';
    // </script>");
}