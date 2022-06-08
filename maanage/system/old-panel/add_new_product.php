<html>
    <form action="add_new.php">
<?php

$p_name=$_POST['p_name'];
$p_price=$_POST['p_price'];
$p_type=$_POST['p_type'];
$p_brief=$_POST['p_brief'];
$details=$_POST['details'];

$db=new mysqli('localhost','root','','avocado');
$q="insert into products values('','$p_name','$p_price','$p_type','$p_brief','$details','','','','','')";
$r=$db->query($q);
if($r){
    echo $p_name." is added";
    //echo "<input type='submit' value='Back to home page'>";
//  echo "<form actin='insert.php' method='POST'>";
}
      
else
    echo "error";
?>
    </form>
    </html>

