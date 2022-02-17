<?php

session_start();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$_SESSION['id'] = $id;
$db= mysqli_connect("localhost", "root","321trewq", "db341","3306") or die ("fail");
$query="SELECT username FROM customers where id='$id'";
$result=mysqli_query($db,$query);


if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='myProfile.html';
            alert('This PublicHealthWorker ID does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='editProfile.php';
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
                SET username='$username', email='$email', password='$password', fname= $fname , lname = $lname, 
                    street = $street , apt = $apt , postalcode = $postalcode , city = $city , phone = $phone
                WHERE id='$id'";
    mysqli_query($db,$EditMyProfileQuery);

    echo "<script>
          window.location.href='myProfile.html';
          alert('Your profile information has been updated successfully into the system');
          </script>";
}
