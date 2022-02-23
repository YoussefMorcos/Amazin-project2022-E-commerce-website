<?php
session_start();
$username = $_SESSION['username'];
session_destroy();
unset($_SESSION['username']);
echo $username;

$newusername = isset($_POST['newUsername']) ? $_POST['newUsername'] : '';
$_SESSION['username'] = $newusername;
echo $newusername;
$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
$newName = $_POST["newUsername"];
$newEmail = $_POST["newemail"];
$newPwd = $_POST["newpass"];
$newFName = $_POST["newfn"];
$newLName = $_POST["newln"];
$newStr = $_POST["newstr"];
$newApt = $_POST["newapt"];
$newPost = $_POST["newpost"];
$newCity = $_POST['newcity'];
$newPhone = $_POST["newphone"];
$query2="UPDATE customers
                SET username='$newName', email='$newEmail', password='$newPwd', fname= '$newFName' , lname = '$newLName', 
                    street = '$newStr' , apt = '$newApt' , postalcode = '$newPost' , city = '$newCity' , phone = '$newPhone'
                WHERE username='$username'";
mysqli_query($db,$query2);
session_start();

$_SESSION['username'] = $newName;

echo "<script>
            window.location.href='modificationSuccess.php';
            </script>";
