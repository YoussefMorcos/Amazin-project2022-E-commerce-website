
<!DOCTYPE html>
<html lang = "en">
<head>
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
    <form id="order-add" method="post">
        <table class="order-add-table">
            <tr>
                <th><label for="order-id">Order ID</label></th>
                <td><input id="order-id" name="order-id" type="text"/></td>
            </tr>
            <tr>
                <th><label for="user-id">User ID</label></th>
                <td><input id="user-id" name="user-id" type="text" /></td>
            </tr>
            <tr>
                <th><label for="date-ordered">Date Ordered</label></th>
                <td><input id="date-ordered" name="date" type="text" /></td>
            </tr>
            <tr>
                <th><label for="products">Products</label></th>
                <td><input type="text" name="products"/></td>
            </tr>
            <tr>
                <th><label for="total">Total</label></th>
                <td><input id="total" name="total" type="text"/></td>
            </tr>
            <tr>
                <th><label for="shipped">Shipped</label></th>
                <td><input id="shipped" name="shipped" type="text" /></td>
            </tr>
        </table>
        <div class="buttons">
            <a class="back" href="/backstore/order-list.php"> < Back To Orders</a>
            <button type="reset" class="cancel">Reset</button>
            <button type="submit" name="submit" class="add" onclick="">Add</button>
            <div id="error"></div>
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