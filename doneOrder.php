<?php
ob_start();
ob_end_flush();
session_start();

include('maanage/system/connection.php');

if(isset($_POST['invo'])){

    $numberOrder = $_POST['invo'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];

    $sqlUpdate="UPDATE `order` SET `order_status` = '2',
                                   `cust_name` = '$name',
                                   `cost_phone` = '$phone',
                                   `ornote` = '$note',
                                   `cost_addres` = '$address' WHERE `order_num` = '$numberOrder'";
    $querUpdate=mysqli_query($con, $sqlUpdate)or die(mysqli_error($con));

    // setcookie('avocadoShop', null, -1, '/'); 
    session_destroy();


    echo json_encode($querUpdate);
    

}



?>