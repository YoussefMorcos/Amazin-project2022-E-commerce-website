
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
            $order_number = $_POST["order-number"];
            $user_id = $_POST["user-id"];
            $date = $_POST["date"];
            $products = $_POST["products"];
            $total = $_POST["total"];
            $shipped = $_POST["shipped"];
        ?>

</br>
</br>
</br>
</br>
</br>
</br>
</br>

    <div class="container">
        <h2 class="list-products">Edit Order</h2>
        <br>
        <br>
        <br>
        <form id="order-edit" method="post">
            <table class="order-edit-table">
                <tr>
                    <th><label for="orderId">Order #</label></th>
                    <?php echo "<td><input type='hidden' id='user' name='order-number1' value='$order_number'></input>$order_number</td>"; ?>
                </tr>
                <tr>
                    <th><label for="userId">User ID</label></th>
                    <?php echo "<td><input type='text' id='user' name='user-id1' value='$user_id'></input></td></td>"; ?>
                </tr>
                <tr>
                    <th><label for="dateOrdered">Date Ordered</label></th>
                    <?php echo "<td><input type='text'  id='user' name='date1' value='$date'></input></td></td>"; ?>
                </tr>
                <tr>
                    <th>Products</th>
                    <?php echo "<td><input type='text'  id='user' name='products1' value='$products'></input></td></td>"; ?>
                </tr>
                <tr>
                    <th><label for="total">Total</label></th>
                    <?php echo "<td><input type='text'  id='user' name='total1' value='$total'></input></td></td>"; ?>
                </tr>
                <tr>
                    <th><label for="shipped">Shipped</label></th>
                    <?php echo "<td><input type='text'  id='user' name='shipped1' value='$shipped'></input></td></td>"; ?>
                </tr>
            </table>
            <div class="buttons">
                <a class="back" href="/backstore/order-list.php"> < Back To Orders</a>
                <button type="button" class="cancel">Cancel</button>
                <button type="submit" name="submit" class="save" onclick="">Save</button>
                <div id="success"></div>
                <div id="error"></div>
            </div>
        </form>
    </div>

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
