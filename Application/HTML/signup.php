<?php
session_start();
$username = isset($_POST['username']) ? $_POST['username'] : '';
$_SESSION['username'] = $username;
$db= mysqli_connect("localhost", "root","321trewq", "db341","3306") or die ("fail");
$query="SELECT username FROM customers where username='$username'";
$result=mysqli_query($db,$query);

if(isset($_POST['Add'])) {

    if ($result->num_rows!=0){
        echo "<script>
            alert('This username already exists in the system ');
            window.location.href='signup.html';
            </script>";
    }else{
        echo "<script>
            window.location.href='signup.html';
            </script>";
    }
}

if(isset($_POST['Submit'])){
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


    $AddUserQuery="insert into customers(username ,email,password,password,fname,lname, street, apt, postalcode, city, phone) values
         ('$username','$email','$password','$fname',' $lname' , '$street' , ' $apt', '$postalcode', '$city' , '$phone')";
    mysqli_query($db,$AddUserQuery);
    $thisUser = "Select username From customers where username='$username'";
    $result = mysqli_query($db,$thisUser);
    $row = $result->fetch_assoc();
    $user= $row['username'];
    echo "<script>
          window.location.href='signup.html';
          alert('This user has been added successfully into the system ');
     
          alert('The created username: $user ');
          </script>";
}
