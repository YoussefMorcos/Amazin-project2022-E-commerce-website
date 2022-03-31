
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
    <form id="user-add" method="post">
        <table class="user-add-table">
            <div class="add">
            <div class="add1">
            <tr>
                <th><label for="first-name">First Name</label></th>
                <td><input id="first-name" type="text" name="first-name"/></td>
            </tr>
            <tr>
                <th><label for="last-name">Last Name</label></th>
                <td><input id="last-name" type="text" name="last-name"/></td>
            </tr>
            <tr>
                <th><label for="password">Password</label></th>
                <td><input id="password" type="password" name="password"/></td>
            </tr>
            <tr>
                <th><label for="postal-code">Postal Code</label></th>
                <td><input id="postal-code" type="text" name="postal-code"/></td>
            </tr>
            <tr>
                <th><label for="email">Email</label></th>
                <td><input id="email" type="text" name="email"/></td>
            </tr>
            </div>
            <tr>
                <th><label for="username">Username</label></th>
                <td><input id="username" type="text" name="username"/></td>
            </tr>
            <tr>
                <th><label for="address">Address</label></th>
                <td><textarea id="address" name="address"></textarea></td>
            </tr>

        </table>
        <div class="buttons">
            <a class="back" href="/backstore/user-list.php"> < Back To Users</a>
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
