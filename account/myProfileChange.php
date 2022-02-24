<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$newName = $_POST["newUsername"];
$newEmail = $_POST["newemail"];
$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
$query="SELECT username FROM customers where username='$newName'";
$query2 = "SELECT email FROM customers where email='$newEmail'";
$result=mysqli_query($db,$query);
$result2=mysqli_query($db,$query2);
echo "<script>
            alert('$username . $email . $newEmail . $newName . $result->num_rows ');
            </script>";

if(isset($_POST['confirmBtn'])) {

    if (($result->num_rows == 0 or ($result->num_rows ==1 and $username == $newName))  and ($result2->num_rows==0 or ($result2->num_rows==1 and $email == $newEmail))){
        session_destroy();
        unset($_SESSION['username']);
        echo $username;
        $newusername = isset($_POST['newUsername']) ? $_POST['newUsername'] : '';
        $_SESSION['username'] = $newusername;
        echo $newusername;
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


    }else{

        echo "<script>
            alert('This username or email already exists in the system ');
            window.location.href='myAccountEdit.php';
            </script>";


    }
}








