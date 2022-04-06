
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
  <div class="container">
      <h2 class="list-orders">List of Orders</h2>
      <br>
      <br>
      <br>
          <table id="order-table" class="list-table">
              <tr>
                  <th></th>
                  <th>Order #</th>
                  <th>User ID</th>
                  <th>Date Ordered</th>
                  <th>Products (Code:Quantity)</th>
                  <th>Total</th>
                  <th>Shipped</th>
              </tr>
              <?php

                  $number = 5;

                  while($number >= 0) {
                      echo "<form method='post' action='order-edit.php'>";
                      echo "<td><input type='checkbox'/></td>";
                      echo "<td><input type='hidden' name='order-number' value='sample'/>sample</td>";
                      echo "<td><input type='hidden' name='user-id' value='sample'/>sample</td>";
                      echo "<td><input type='hidden' name='date' value='sample'/>sample</td>";
                      echo "<td><input type='hidden' name='products' value='sample'/>sample</td>";
                      echo "<td><input type='hidden' name='total' value='sample'/>sample</td>";
                      echo "<td><input type='hidden' name='shipped' value='sample'/>sample</td>";
                      echo "<td><button type='submit' name='submit'>Edit</button></td>";
                      echo '</tr>';
                      echo "</form>";

                      $number--;
                  }

              ?>
          </table>
          <form method="post">
          <div class="buttons">
              <label>Order ID </label><input type="text" name="orderID"/>
              <button type="submit" name="delete" id="delete" class="delete">Delete</button>
              <a href="order-add.php"><button type="button" id="delete">Add</button></a>
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