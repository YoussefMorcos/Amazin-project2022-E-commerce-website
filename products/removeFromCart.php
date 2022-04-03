<?php
session_start();
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$username = $_SESSION['username'];
$productId = $_POST['code'];
$quantity = $_POST['quantity'];
$quantityQuery = "select quantity from carts where productId='$productId' and customerId = (select id from customers where username = '$username')";
$realQuantity = 0;
$result=mysqli_query($db,$quantityQuery);
$row = $result->fetch_assoc();
$realQuantity = $row['quantity'];

if($quantity > $realQuantity ){
    echo '<script>
            window.location.href="../account/cart.php";
            alert("You dont have the amount you entered in your cart");
            </script>';

}else if($realQuantity>$quantity){
    echo $result->num_rows == 0;
    $query="UPDATE carts
                SET quantity='$realQuantity' - '$quantity'
                WHERE productId='$productId' and customerId = (select id from customers where username = '$username' )";
    mysqli_query($db,$query);
    echo "<script>
            window.location.href='../account/cart.php';
            alert('updated successfully');
            </script>";
}else{
    $query="delete from carts
                WHERE productId='$productId' and customerId = (select id from customers where username = '$username' )";
    mysqli_query($db,$query);
    echo "<script>
            window.location.href='../account/cart.php';
            alert('item removed successfully');
            </script>";
}
