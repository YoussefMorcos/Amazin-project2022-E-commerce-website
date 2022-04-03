<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/index.css" />

    <style>
        td{
            border: solid black 3px;
        }

    </style>
</head>
<body>
<?php
include ("../navbar.php");
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$query = "select * from customers where type = 'seller'" ;
$result = mysqli_query($db,$query);
?>

<table style="width: 100%; border: solid black 3px">
    <tr>
        <td>ID</td>
        <td>username</td>
        <td>email</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>




    <?php

    while($row = mysqli_fetch_assoc($result)){
    $userId = $row['ID'];
    $username = $row['username'];
    $email = $row['email'];
    $fname = $row['fname'];
    $lname = $row['lname'];

    ?>
    <tr>
        <td><?php echo $userId;?></td>
        <td><?php echo $username;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $fname;?> </td>
        <td><?php echo $lname;?></td>
        <form action="admin-edit-delete-User-Seller.php" method="post">

           <?php echo" <input name='id' type='hidden' value= $userId>";?>
            <td><button type="submit" name="Edit">Edit</button></td>
            <td><button type="submit" name="Delete">Delete</button></td>
        </form>
    </tr>
</table>


<?php }

?>


</body>
</html>
