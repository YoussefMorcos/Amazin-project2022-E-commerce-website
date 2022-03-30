
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


    <div class="container">
        <h2>List of Users</h2>
        <br>
        <br>
        <br>
            <table class="list-table" id="user-table">
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Postal Code</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>ID</th>
                </tr>
                <?php

                    $number = 5;

                    while($number >= 0) {
                        echo "<form method='post' action='user-edit.php'>";
                        echo "<td><input type='checkbox'/></td>";
                        echo "<td><input type='hidden' name='first-name' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='last-name' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='password' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='postal-code' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='email' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='user' value='sample'/>sample</td>";
                        echo "<td><input type='hidden' name='ID' value='sample'/>sample</td>";
                        echo "<td><button type='submit' name='submit'>Edit</button></td>";
                        echo '</tr>';
                        echo "</form>";

                        $number--;
                    }

                    ?>

        </table>
        <form method="post">
        <div class="buttons">
        <label>User ID </label><input type="text" name="userID"/>
        <button type="submit" name="delete" class="delete" id="delete">Delete</button>
        <a href="user-add.php"><button type="button" id="delete">Add</button></a>
        </div>
        </form>
    </div>

</br>
</br>
</br>
</br>
  <?php
      include "../snippets/footer.php";
    ?>
</body>
</html>