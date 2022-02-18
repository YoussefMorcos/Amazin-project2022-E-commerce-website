<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
</head>
<body>


<?php
session_start();

$username = $_SESSION['username'];


$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
$query = "Select * from customers where username = '$username'";

$result = mysqli_query($db,$query);
$row = $result->fetch_assoc();

$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
$fname = $row['fname'];
$lname = $row['lname'];
$street = $row['street'];
$apt = $row['apt'];
$postalcode = $row['postalcode'];
$city = $row['city'];
$phone = $row['phone'];


?>


<div id="addForm" style="wusernameth: 70%; float: right; margin-right: 3%;margin-top: 10%" >
    <form method="post"  action="editProfile.php">
        <div class="row">
            <div class="col">
                <input name="username" type="text" class="form-control" placeholder="username" value="<?php echo $username?>">
            </div>
        </div>
        <br/>

        <br/>
        <br/>
        <div>
            <label><b>My info</b></label>
        </div>

        <br/>

        <div class="row">
            <div class="col">
                <input name="email" type="email" class="form-control" placeholder="e-mail" value="<?php echo $email?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input name="password" type="password" class="form-control" placeholder="password" value="<?php echo $password?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input  name="fname" type="text" class="form-control" placeholder="first name" value="<?php echo $fname;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="lname" type="text" class="form-control" placeholder="last name" value="<?php echo $lname;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="street" type="text" class="form-control" placeholder="street" value="<?php echo $street;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="apt" type="number" class="form-control" placeholder="apartment number" value="<?php echo $apt;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="postalcode" type="text" class="form-control" placeholder="postal code" value="<?php echo $postalcode;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="city" type="text" class="form-control" placeholder="city" value="<?php echo $city;?>">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <input  name="phone" type="text" class="form-control" placeholder="phone number" value="<?php echo $phone;?>">
            </div>

        </div>

        <br/><br/>

        <button name="Save" type="submit" class="btn btn-primary btn-lg btn-block">Save</button>

    </form>
</div>


</div>
</body>
</html>

