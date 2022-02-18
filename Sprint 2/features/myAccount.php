<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My profile</title>
</head>
<body>
<?php
session_start();
$username = $_SESSION['username'];
?>
<form  action="editProfile.php" method="post" >
    <input id="username" name="username" value= "<?php echo "$username"?>"class="form-control form-control-lg" type="text" placeholder="enter username">
    <br/>

    <button name="Edit" type="submit" class="btn btn-primary">Edit</button>


</form>


</body>
</html>
