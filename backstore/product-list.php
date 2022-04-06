
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

    <div class="container">
        <h2 class="list-products">List of Products</h2>
        <br>
        <br>
        <br>
            <table class="list-table" id="product-table">
                <tr>
                    <th></th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Origin</th>
                    <th>Aisle</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
                <?php

                    $number = 5;

                    while($number >= 0) {
                        echo "<form method='post' action='product-edit.php'>";
                        echo "<td><input type='checkbox'/></td>";
                        echo "<td><input type='hidden' name='code' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='name' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='price' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='description' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='origin' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='aisle' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='stock' value='sample'/>sample</td>";
                        echo "<td><button type='submit' name='submit'>Edit</button></td>";
                        echo '</tr>';
                        echo "</form>";

                        $number--;
                    }

                ?>
            </table>
                </br>
                </br>
                <form method="post">
                <div class="buttons">
                    <label>Code ID </label><input type="text" name="codeID"/>
                    <button type="submit" id="delete" name="delete">Delete</button>
                    <a href="product-add.php"><button type="button" id="delete">Add</button></a>
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