<?php
$conn=mysqli_connect("localhost","root","","ajax");
function getMemberUserid($conn, $phone, $field)
{
    $sql = "SELECT * FROM `max_meber` WHERE `phone`='" . $phone . "'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);
    if ($num > 0) {
        $fetch = mysqli_fetch_assoc($res);

        return $fetch[$field];
    }
}





$uid = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '';
$response = [];
if ($uid){
    $userName = getMemberUserid($conn,$uid,'name');
    if ($userName){
        $response['name'] = $userName;
        $response['status'] = 1;
    }else{
        $response['name'] = null;
        $response['status'] = 0;
    }

}else{
    $response['name'] = null;
    $response['status'] = 0;
}

echo json_encode($response);
die;