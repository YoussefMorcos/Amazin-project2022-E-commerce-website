<?php
session_start();
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$_SESSION['username'] = $username;
$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
$query="SELECT username FROM customers where username='$username'";
$query2 = "SELECT email FROM customers where email='$email'";
$result=mysqli_query($db,$query);
$result2=mysqli_query($db,$query2);

if(isset($_POST['Add'])) {

    if ($result->num_rows!=0 or $result2->num_rows!=0){
        echo "<script>
            alert('This username already exists in the system ');
            window.location.href='signupHTML.php';
            </script>";
    }else{

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


        $AddUserQuery="insert into customers(username ,email,password,fname,lname, street, apt, postalcode, city, phone) values
         ('$username','$email','$password','$fname',' $lname' , '$street' , ' $apt', '$postalcode', '$city' , '$phone')";
        mysqli_query($db,$AddUserQuery);
        $thisUser = "Select username From customers where username='$username'";
        $result2 = mysqli_query($db,$thisUser);
        $row2 = $result2->fetch_assoc();
        $user= $row2['username'];
        echo "<script>
          window.location.href='signupSuccess.php';
          alert('This user has been added successfully into the system ');
     
          alert('The created username: $user ');
          </script>";
        echo "<script>
            window.location.href='signup.php';
            </script>";
    }
}