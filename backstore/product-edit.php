
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/index.css" />
    <link rel="stylesheet" href="../Application/css/user-list.css" />
    <link rel="stylesheet" href="../Application/css/backstore.css" />
    <title>AMAZIN</title>
</head>
<body>
    <?php
      include "../snippets/navbar.php";
    ?>
    <?php
        $code = $_POST['code'];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $moreDescription = $_POST["moreDescription"];
        $origin = $_POST["origin"];
        $aisle = $_POST["aisle"];
        $stock = $_POST["stock"];

    ?>


    <div class="container">
        <h2 class="list-products">Edit Product</h2>
        <br>
        <br>
        <br>
        <form id="product-edit" method="post">
            <table class="product-edit-table">
                <tr>
                    <th><label for="code">Code</label></th>
                    <?php
                         echo "<td><input type='hidden' name='code1' value='$code' />$code</td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="name">Name</label></th>
                    <?php
                        echo "<td><input type='text' name='name1' value='$name' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="price">Price</label></th>
                    <?php
                        echo "<td><input type='text' name='price1' value='$price' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="description">Description</label></th>
                    <?php
                        echo "<td><input type='text' name='description1' value='$description' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="origin">Origin</label></th>
                    <?php
                        echo "<td><input type='text' name='origin1' value='$origin' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="aisle">Aisle</label></th>
                    <?php
                        echo "<td><input type='text' name='aisle1' value='$aisle' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="stock">Stock</label></th>
                    <?php
                        echo "<td><input type='text' name='stock1' value='$stock' /></td>" ;
                    ?>
                </tr>
            </table>
                <div id="success"></div>
                </br>
            <div class="buttons">
                <a class="back" href="/backstore/product-list.php"> < Back To Products</a>
                <button type="reset" class="cancel">Reset</button>
                <button type="submit" name="save" class="save" onclick="">Save</button>
            </div>
        </form>
    </div>


    <?php
        include "../snippets/footer.php";
      ?>
    </body>
</html>