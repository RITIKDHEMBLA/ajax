<?php
$conn=mysqli_connect("localhost","root","","ajax");
$response=[];



$sql="SELECT * FROM `max_meber` WHERE phone='".$_POST['phone']."' or email='".$_POST['email']."'";
$res = mysqli_query($conn,$sql);
$num = mysqli_num_rows($res);
if(mysqli_num_rows($res) == 0) {

    
$response=[];
if(isset($_POST['name'])&&($_POST['name']!="") && isset($_POST['phone'])&&($_POST['phone']!="")&& isset($_POST['email'])&&($_POST['email']!="")){
$qr="INSERT INTO `max_meber`( `name`, `phone`, `email`) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."')";
$sql2=mysqli_query($conn,$qr);

if($sql2){
    $response['success']=true;
}
echo json_encode($response);}}
else
{
    $response['success']=false;
    echo json_encode($response);
  
}