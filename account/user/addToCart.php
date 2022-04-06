<?php
session_start();

if(isset($_SESSION["username"]))    // USER LOGGED IN
{
    $username = $_SESSION['username'];
    $productId = $_POST["code"];
    $quantity = $_POST['quantity'];

    $db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
    $quantitycheck = "SELECT quantity FROM products where id='$productId'";
    $quantityresult = mysqli_query($db, $quantitycheck);
    $rowQcheck = $quantityresult->fetch_assoc();
    if ($rowQcheck['quantity'] >= $quantity) {
        $query = "SELECT id FROM customers where username='$username'";
        $result = mysqli_query($db, $query);
        $row = $result->fetch_assoc();
        $customerId = $row['id'];
        $querycheck = "SELECT productId from carts where productId = '$productId' and customerId = '$customerId'";
        $resultcheck = mysqli_query($db, $querycheck);
        if ($resultcheck->num_rows == 0) {
            $query2 = "insert into carts(customerId ,productId,quantity) values ('$customerId','$productId','$quantity')";
            mysqli_query($db, $query2);
            echo "<script>
            window.location.href='cart.php';
            alert('item added successfully ');
            </script>";

        } else {
            $query2 = "UPDATE carts SET quantity = quantity + '$quantity' WHERE productId = '$productId' and customerId = '$customerId'; ";
            mysqli_query($db, $query2);
            echo "<script>
            window.location.href='cart.php';
            alert('item added successfully ');
            </script>";
        }
    }else{
        echo "<script>
            window.location.href='../../index.php';
            alert('Sorry we do not have this amount ready in stock');
            </script>";
}

}else {
    echo "<script>
            window.location.href='../general/logIn.php';
            alert('please log in or register to have a cart ');
            </script>";
}
