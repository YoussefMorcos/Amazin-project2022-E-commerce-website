<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/menu-bar.css"/>
    <link rel="stylesheet" href="../Application/css/footer.css"/>
    <link rel="stylesheet" href="../Application/css/product-landing.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
            sans: ['Inter', 'sans-serif'],
            },
        }
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <title>My Orders</title>
</head>
<body>

<?php
include ('../navbar.php');

//"My orders heading"
$heading1 = "<h1 class=\"font-medium leading-tight text-5xl mt-1 mb-2  bg-[#59ACB3] text-white\" style=\"height: 300px;text-align: center;\">
            <div style=\"height: 100px;\"></div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Orders
            </h1>
";

//Table heading
$order_table_headings = "<a class=\"landing-item__link\" >
<div class=\"landing-item\"
    <div class=\"landing-item_content\">
        <div class=\"landing-item_content--header\">
            <div class=\"landing-item_content--header-name\">
                <p class=\"item--title\">
                              Order ID           
                </p>

            </div>

            <div style='position: absolute;right: 20px' class=\"landing-item_content--header-price\">
                <h3 class=\"item--price\">
                       Final Cost            
                </h3>                                            
            </div>

        </div>
        <h3 style='position: absolute;left: 50%' class=\"item--desc\">
                  Date Ordered                
        </h3>
                           
    </div>
                        
</div>
</a>";

echo $heading1;
echo $order_table_headings;

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

include ('../footer.php');
?>


</body>