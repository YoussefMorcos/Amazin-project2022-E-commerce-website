
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
            $first_name = $_POST["first-name"];
            $last_name = $_POST["last-name"];
            $password = $_POST["password"];
            $postal_code = $_POST["postal-code"];
            $email = $_POST["email"];
            $user = $_POST["username"];
            $ID = $_POST["ID"];
            $address = $_POST["address"];
    ?>


    <div class="edit-users">
        <h2 class="list-users">Edit User</h2>
        <br>
        <br>
        <br>
            <form id="product-edit" method="post">
            <table class="product-edit-table">
                <tr>
                    <th><label for="first-name">First Name</label></th>
                    <?php
                         echo "<td><input type='text' id='first-name' name='first-name1' value='$first_name' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="last-name">Last Name</label></th>
                    <?php
                        echo "<td><input type='text' id='last-name' name='last-name1' value='$last_name' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="password">Password</label></th>
                    <?php
                        echo "<td><input type='text' id='password' name='password1' value='$password' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="postal-code">Postal Code</label></th>
                    <?php
                        echo "<td><input type='text' id='postal-code' name='postal-code1' value='$postal_code' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="email">Email</label></th>
                    <?php
                        echo "<td><input type='text' id='email' name='email1' value='$email' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="username">Username</label></th>
                    <?php
                        echo "<td><input type='text' id='username' name='user1' value='$user' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="ID">ID</label></th>
                    <?php
                        echo "<td><input type='text' id='ID' name='ID1' value='$ID' /></td>" ;
                    ?>
                </tr>
                <tr>
                    <th><label for="address">Address</label></th>
                    <?php
                        echo "<td><textarea id='address' name='address'>$address</textarea></td>" ;
                    ?>
                </tr>
            </table>
                <div id="success"></div>


        <div class="buttons">
          <a class="back" href="/backstore/user-list.php"> < Back To Users</a>
          <button type="submit" name="submit" class="delete" onclick="">Save</button>
        </div>
        </form>
        <br>
        <br>

    </div>

    <script src="../public/scripts/backstore.js"></script>


    <?php
        include "../snippets/footer.php";
      ?>
</body>
</html>