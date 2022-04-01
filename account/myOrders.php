<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/menu-bar.css"/>
    <link rel="stylesheet" href="../Application/css/footer.css"/>
    <link rel="stylesheet" href="../Application/css/product-landing.css"/>
    <title>STORE</title>
</head>
<body>

<?php
include ('../navbar.php');


$id = $_SESSION['id'];
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$query = "select Distinct oid ,date from orders where customerId = '$id'";
$result = mysqli_query($db,$query);

$totalPriceQuery = "select SUM(total) as orderTotal from orders where customerId = '$id' group by oid ";
$result2 = mysqli_query($db,$totalPriceQuery);
while($row = mysqli_fetch_assoc($result) and $row2 = mysqli_fetch_assoc($result2)){
    $date = $row['date'];
    $orderId = $row['oid'];
    $orderTotal =round($row2['orderTotal'],2) ;
    $item = "<a class=\"landing-item__link\" href=\"orderDetails.php?orderId=$orderId\">
                               <div class=\"landing-item\"
                                   <div class=\"landing-item_content\">
                                       <div class=\"landing-item_content--header\">
                                           <div class=\"landing-item_content--header-name\">
                                               <p class=\"item--title\">
                                                   Order" . $orderId . "
                                               </p>

                                           </div>
                                           <div style='position: absolute;right: 20px' class=\"landing-item_content--header-price\">
                                               <h3 class=\"item--price\">
                                                   " . $orderTotal . "$
                                               </h3>                                            
                                           </div>

                                       </div>
                                       <h3 style='position: absolute;left: 50%' class=\"item--desc\">
                                           " . $date . "
                                       </h3>
                                   
                                   </div>
                                
                               </div>
                           </a>";
    echo $item;
}



