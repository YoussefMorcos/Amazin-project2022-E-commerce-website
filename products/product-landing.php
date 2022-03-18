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

$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$aisle = isset($_GET['aisle']) ? $_GET['aisle'] : 'general';
$cleanAisle = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
if($aisle != "general")
$query = "SELECT * FROM products where category='$aisle'";
else $query = "SELECT * FROM products";
$result = mysqli_query($db, $query);

?>
<?php
include "../navbar.php";
?>
<div class="container">
    <div class="header">
        <h1><?php echo $cleanAisle; ?></h1>
    </div>
    <div class="content">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $code = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $aisle = $row['category'];
            $asset = strtolower(str_replace(" ", "_", $name));


            $imgPath = "../" . $row['imgPath'] . "/";
            $linkPath = "product-detail.php?code=" . $code;
            $img = "<img class=\"landing-item_img\"  src=\"" . $imgPath . "\"alt=\"" . $asset . "\" />";

            $item = "<a class=\"landing-item__link\" href=\"" . $linkPath . "\">
                               <div class=\"landing-item\">
                                   <div class=\"landing-item_img-wrapper\">
                                       " . $img . "
                                   </div>
                                   <div class=\"landing-item_content\">
                                       <div class=\"landing-item_content--header\">
                                           <div class=\"landing-item_content--header-name\">
                                               <p class=\"item--title\">
                                                   " . $name . "
                                               </p>

                                           </div>
                                           <div class=\"landing-item_content--header-price\">
                                               <p class=\"item--price\">
                                                   " . $price . "$
                                               </p>
                                           </div>

                                       </div>
                                       <p class=\"item--desc\">
                                           " . $description . "
                                       </p>
                                   </div>
                               </div>
                           </a>";
            echo $item;
        }
        ?>
    </div>
</div>

<?php
include "../footer.php";
?>
</body>
</html>
