<!DOCTYPE html>
<?php
include "../navbar.php";


$productId = $_GET["code"];
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$aisle = isset($_GET['aisle']) ? $_GET['aisle'] : 'general';
$cleanAisle = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
$query = "SELECT * FROM products,customers where sellerID = customers.id  and products.id = '$productId'";
$result = mysqli_query($db, $query);
$row = $result->fetch_assoc();
$code = $row['id'];
$_SESSION['code'] = $code;
$name = $row['name'];
$price = $row['price'];
$type = $row['type'];

$description = $row['description'];
$aisle = $row['category'];
$asset = strtolower(str_replace(" ", "_", $name));
$imgPath = "../" . $row['imgPath'] . "/";
$img = "<img class=\"detail-item_img\"  src=\"../" . $imgPath . "\"alt=\"" . $asset . "\" />";



if(isset($_POST["submit"])) {
    $cartSource = fopen("../files/cart.csv", "a") or die("WTF");
    $quantity = $_POST["quantity"];
    $code = $_POST["code"];
    $text = $code . "," . $quantity . "\n";
    fwrite($cartSource, $text);

    fclose($cartSource);
}
?>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/product-detail.css" />
    <title>STORE</title>
    <style>
        img {
            height: 100px;
        }

    </style>
</head>
<body>
<?php

?>
<div class="">
    <div class="content">
        <div class="detail-item">
            <div class="detail-item_img-wrapper">
                <?php
                echo $img;
                ?>
            </div>
            <div class="detail-item_content">
                <div class="detail-item_content--header">
                    <div class="detail-item_content--header-name">
                        <p class="item--title">
                            <?php
                            echo $name;
                            ?>
                        </p>

                    </div>
                    <div class="landing-item_content--header-price">
                        <?php
                        echo $price . "$";
                        ?>

                    </div>
                </div>
                <p class="item--desc">
                    <?php
                    echo $description;
                    $moreDescription = "";
                    if ($moreDescription != "") {
                        echo "<br /><br />
                                <a href=\"more-info.php?code=$code\">
                                    More information...
                                </a>";
                    }

                    ?>
                <div class=\"landing-item_content--header-price\">
                    <p style='float: right' class=\"item--price\">
                        seller:  <?php echo  $row['username'] ;?><br>
                        seller ID:  <?php echo $row['sellerID'] ;?> <br>
                        product id: <?php echo $row['id'];?><br>
                       <?php echo "<B>only ".$row['quantity']." left in stock!</B>";?>
                    </p>
                </div>
                </p>
                <div class="item--add-to-bag">
<?php if($type=="seller"){ echo"
    <form action='sellerProducts.php' method='post'>
             
                        <input name='code' type='hidden' value=  $code  />
                        <button type='submit' name='Edit'>Edit</button>
                        <button type='submit' name='Delete'>Delete</button>
                    </form>";

}else{
    echo"
                    <form action='addToCart.php' method='post'>
                        <label for='quantity'>Quantity</label>
                        <input id='quantity' name='quantity' type='text' value='1' />
                        <input name='code' type='hidden' value=  $code  />
                        <button type='submit' name='submit'>Add to Cart</button>
                    </form>";
                    }?>



                    <div id="error"></div>
                    <div id="success"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../footer.php";
?>
</body>
</html>
