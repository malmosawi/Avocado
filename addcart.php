<?php
ob_start();
ob_end_flush();
session_start();

include('maanage/system/connection.php');



if(isset($_POST['id'])){
    $quantity = 1 ;

    $Product_id = $_POST['id'];

    if( $Product_id != '' && $Product_id != 0 ){

        // foreach($_COOKIE as  $key => $val){

        //     if($key == 'avocadoShop'){
        //         $here = 'true';
        //     } else {
        //         $here = 'false';
        //     }
        // }
        if (isset($_SESSION['avocadoShop'])) {
            if ($_SESSION['avocadoShop'] != '' and  $_SESSION['avocadoShop'] != 0 and  $_SESSION['avocadoShop'] > 0) {
                $here = 'true';
            } else {
                $here = 'false';
            }
        } else {
            $here = 'false';
        }
        $check = 'false';
        if( $here == 'true'){

            if (isset($_POST['quantity'])) {
                $quantity = $_POST['quantity'];
                if ($_POST['quantity'] == '') {
                    $quantity = 1;
                } else {
                    $quantity = $_POST['quantity'];
                }
            } else {
                $quantity = 1;
            }
            $invo_no_old =  $_SESSION['avocadoShop'];


            $sqllastID="SELECT `order_id` as orderID from `order` WHERE `order_num` = '$invo_no_old' ";
            $querlastID=mysqli_query($con, $sqllastID);
    
            $the_id = mysqli_fetch_assoc($querlastID);
            $order_id = $the_id['orderID'];
    
    
            $sqlOrderDestils="INSERT INTO `order_details`( `order_id`, `product_id`, `product_quantity`)
            VALUES ('$order_id', '$Product_id', '$quantity' )";
            $querOrderDe=mysqli_query($con, $sqlOrderDestils);

            $check = 'true';
    
        }else if( $here == 'false'){
    
            // $invo_no = rand(100,40000);
            // $cookie_name = "avocadoShop";
            // $cookie_value = $invo_no;
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    

            $invo_no = rand(100,40000);
            $_SESSION['avocadoShop'] = $invo_no ;
    

    
            $sqlNewOrder="INSERT INTO `order`(`order_num`, `cust_name`, `cost_phone`, `cost_addres`,  `order_status`) 
            VALUES ('$invo_no', '','','',1)";
            $querNewOrder=mysqli_query($con, $sqlNewOrder);
    
            $sqllastID="SELECT `order_id` as orderID from `order` WHERE `order_num` = '$invo_no' ";
            $querlastID=mysqli_query($con, $sqllastID);
    
            $the_id = mysqli_fetch_assoc($querlastID);
            $order_id = $the_id['orderID'];
    
    
            $sqlOrderDestils="INSERT INTO `order_details`( `order_id`, `product_id`, `product_quantity`)
            VALUES ('$order_id', '$Product_id', 1)";
            $querOrderDe=mysqli_query($con, $sqlOrderDestils);


            $check = 'true';

            
    
        }else{
            $check = 'false';
        }

        echo json_encode($check);
    }


}











?>