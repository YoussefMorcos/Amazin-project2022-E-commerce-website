<!DOCTYPE html>
  <?php

      $data = file_get_contents("files/products.csv");

      $productId = $_GET["code"];
      $products = fopen("files/products.csv", "r");



      while ($row = fgetcsv($products)) {
        if ($row[0] == $productId) {
          $product = $row;
          break;
        }
     }



     $code = $product[0];
     $name = $product[1];
     $price = $product[3];
     $description = $product[2];
     $aisle = $product[4];
     $asset = strtolower(str_replace(" ", "_", $name));


     $imgPath = "assets/" . $aisle . "/" . $asset . ".jpg";
    $img = "<img class=\"detail-item_img\"  src=\"" . $imgPath . "\"alt=\"" . $asset . "\" />";

     fclose($products);

    if(isset($_POST["submit"])) {
        $cartSource = fopen("files/cart.csv", "a") or die("WTF");
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
</head>
<body>
  <?php
    include "snippets/navbar.php";
  ?>
  <div class="container">
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
                  </p>
                  <div class="item--add-to-bag">
                      <form method="post">
                          <label for="quantity">Quantity</label>
                          <input id="quantity" name="quantity" type="text" value="1" />
                          <input name="code" type="hidden" value=<?php echo '"' . $code . '"'; ?> />
                          <button type="submit" name="submit">Add to Cart</button>
                      </form>
                      <div id="error"></div>
                      <div id="success"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <?php
    include "snippets/footer.php";
   ?>
</body>
</html>
