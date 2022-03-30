<?php

    if(isset($_POST["submit"])) {

        $first_name1 = $_POST["first-name1"];
        $last_name1 = $_POST["last-name1"];
        $password1 = $_POST["password1"];
        $postal_code1 = $_POST["postal-code1"];
        $email1 = $_POST["email1"];
        $user1 = $_POST["user1"];
        $ID1 = $_POST["ID1"];


        $data = file_get_contents("../files/users.csv");
        $newData1;
        $newData2;
        $newData3;
        $newData4;
        $newData5;
        $newData6;
        $newData7;
        $newRow;
        $oldRow;

        $file = fopen("../files/users.csv", "r");

        while($row = fgetcsv($file)) {
             if($row[6] == $ID1) {
                $newData1 = $row[0];
                $newData2 = $row[1];
                $newData3 = $row[2];
                $newData4 = $row[3];
                $newData5 = $row[4];
                $newData6 = $row[5];
                $newData7 = $row[6];

                $oldRow = implode(",", $row);
                $newRow = implode(",", $row);
                $newRow = str_replace($newData1, $first_name1, $newRow);
                $newRow = str_replace($newData2, $last_name1, $newRow);
                $newRow = str_replace($newData3, $password1, $newRow);
                $newRow = str_replace($newData4, $postal_code1, $newRow);
                $newRow = str_replace($newData5, $email1, $newRow);
                $newRow = str_replace($newData6, $user1, $newRow);
                $newRow = str_replace($newData7, $ID1, $newRow);
                break;
            }
         }
        fclose($file);

       $data = str_replace($oldRow, $newRow, $data);

        $f = fopen("../files/users.csv", "w");
        fwrite($f, $data);

        fclose($f);
    }

?>


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
            $user = $_POST["user"];
            $ID = $_POST["ID"];
    ?>


    <div class="edit-users">
        <h2 class="list-users">Edit User</h2>
        <br>
        <br>
        <br>
        <form method="post">
            <table class="list-table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Postal Code</th>
                    <th>Email</th>
                    <th>User</th>
                </tr>
                <tr>
                    <?php echo "<td><input type='text'  id='first-name' name='first-name1' value='$first_name'></input></td></td>"; ?>
                    <?php echo "<td><input type='text'  id='last-name' name='last-name1' value='$last_name'></input></td></td>"; ?>
                    <?php echo "<td><input type='text'  id='password' name='password1' value='$password'></input></td></td>"; ?>
                    <?php echo "<td><input type='text'  id='postal-code' name='postal-code1' value='$postal_code'></input></td></td>"; ?>
                    <?php echo "<td><input type='text'  id='email' name='email1' value='$email'></input></td></td>"; ?>
                    <?php echo "<td><input type='text'  id='user' name='user1' value='$user'></input></td></td>"; ?>
                    <?php echo "<td><input type='hidden'  id='user' name='ID1' value='$ID'></input></td></td>"; ?>
                </tr>
            </table>
            <div id="success"></div>
        <div class="buttons">
          <a class="back" href="/backstore/user-list.php"> < Back To Users</a>
          <button type="submit" name="submit" class="delete" onclick="editUser()">Save</button>
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