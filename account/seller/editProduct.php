<!DOCTYPE html>
<?php
include "../../navbar.php";


$code = $_SESSION['id'];
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$query = "SELECT * FROM products where id = '$code'";
$result = mysqli_query($db, $query);
$row = $result->fetch_assoc();
$code = $row['id'];
$quantity = $row['quantity'];
$_SESSION['code'] = $code;
$name = $row['name'];
$price = $row['price'];
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
    <link rel="stylesheet" href="../../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../../Application/css/footer.css" />
    <link rel="stylesheet" href="../../Application/css/product-detail.css" />
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
<form action="sellerProducts.php" method="post">
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
                        <input class="item--title" name="name" value=" <?php
                        echo $name;
                        ?>"

                        />

                    </div>
                    <input type="text"  name="price" value=" <?php
                    echo $price ;
                    ?>" class="landing-item_content--header-price"


                    />
                </div>
                <input class="item--desc" type="text" value="<?php
                    echo $description;?>" name="description"/>
                    <?php
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

                        <?php echo "<B>only <input type='number' name='quantity' value='$quantity'> left in stock!</B>";?>
                    </p>
                </div>
         <?php echo"       <input name='code' type='hidden' value= $code>"?>
                <button type="submit" name="Save">Save</button>
                </p>
                    <div id="error"></div>
                    <div id="success"></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

</form>
<?php
include "../../footer.php";
?>
</body>
</html>


