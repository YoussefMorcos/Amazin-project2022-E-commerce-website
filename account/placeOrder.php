<?php
session_start();
$id = $_SESSION['id'];
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$query = "select SUM(id) as orderId from carts where customerId = '$id' ";
$result = mysqli_query($db,$query);
$row = $result->fetch_assoc();
$orderId = $row['orderId'];
$query2 = "select * from products where id = (select productId from carts where customerId = '$id') ";
$result2 = mysqli_query($db,$query2);

if(isset($_POST['order'])){
    //updating product quantities
    //create the order
    $quantitiesQuery = "select productId,quantity from carts where customerId = '$id'";
    $result3 = mysqli_query($db,$quantitiesQuery);
    ;
    while($row2 = mysqli_fetch_assoc($result3)) {

        $prodId = $row2['productId'];
        $qty = $row2['quantity'];
        $priceQuery = "select price from products where id = '$prodId'";
        $result4 = mysqli_query($db,$priceQuery);
        $row4 = $result4->fetch_assoc();
        $price = $row4['price'];
        echo"<script>
alert($orderId','$id','$prodId','$qty',,'$qty'*'$price')
</script>";

        $insertIntoOrdersQuery = "insert into orders (oid,customerId,productId,quantity,date,total) 
values ('$orderId','$id','$prodId','$qty',CURDATE(),'$qty'*'$price')";
        mysqli_query($db,$insertIntoOrdersQuery);
        $updateProductsQuery = "Update products 
    set quantity = quantity - '$qty'
    where id = '$prodId'";
        mysqli_query($db,$updateProductsQuery);
    }

        //empty the customer cart
        $deleteCartQuery = "Delete from carts where customerId = '$id'";
        mysqli_query($db,$deleteCartQuery);

          echo "<script>
          window.location.href='myOrders.php';
          alert('The created order ID: $orderId ');
          </script>";




}
