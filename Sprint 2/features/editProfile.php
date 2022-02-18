<?php

session_start();
$username= isset($_POST['username']) ? $_POST['username'] : '';
 $_SESSION['username'] = $username;
$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
$query="SELECT * FROM customers where username='$username'";
$result=mysqli_query($db,$query);


if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='myProfile.html';
            alert('account does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='MyProfile.php';
            </script>";

    }
}
if(isset($_POST['Save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $street = $_POST['street'];
    $apt = $_POST['apt'];
    $postalcode = $_POST['postalcode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];




    $EditMyProfileQuery= "UPDATE customers
                SET username='$username', email='$email', password='$password', fname= '$fname' , lname = '$lname', 
                    street = '$street' , apt = '$apt' , postalcode = '$postalcode' , city = '$city' , phone = '$phone'
                WHERE username='$username'";
    mysqli_query($db,$EditMyProfileQuery);

    echo "<script>
          window.location.href='myProfile.html';
          alert('Your profile information has been updated successfully into the system');
          </script>";
}
