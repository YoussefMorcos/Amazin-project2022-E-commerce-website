
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

</br>
</br>
</br>
</br>
</br>
</br>
</br> 

  <form id="product-add" method="post">
    <table class="product-add-table" id="product-add-table">
                <tr>
                    <th><label for="name">Name</label></th>
                    <td><input id="name" type="text" name="name"/></td>
                </tr>
                <tr>
                    <th><label for="price">Price</label></th>
                    <td><input id="price" type="text" name="price"/></td>
                </tr>
                <tr>
                    <th><label for="description">Description</label></th>
                    <td><textarea id="description" name="description"></textarea></td>
                </tr>
                <tr>
                    <th><label for="origin">Origin</label></th>
                    <td><input id="origin" type="text" name="origin"/></td>
                </tr>
                <tr>
                    <th><label for="aisle">Aisle</label></th>
                    <td><input id="aisle" type="text" name="aisle"/></td>
                </tr>
                <tr>
                    <th><label for="stock">Stock</label></th>
                    <td><input id="stock" type="text" name="stock"/></td>
                </tr>
    </table>
    <div class="buttons">
        <a class="back" href="/backstore/product-list.php"> < Back To Products</a>
        <button type="reset" class="cancel">Reset</button>
        <button type="submit" name="submit" class="add" onclick="">Add</button>
    </div>
  </form>

  </br>
</br>
</br>
</br>
</br>
</br>
</br>

  <?php
      include "../snippets/footer.php";
    ?>
</body>
</html>