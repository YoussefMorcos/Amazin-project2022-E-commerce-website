<?php
session_start();
session_destroy();
unset($_SESSION['username']);



if(!isset($_POST["logIn"]))        // if button log in is not clicked
{
    ?>

    <html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/index.css" />
    <link rel="stylesheet" type="text/css" href="../Application/css/signup.css">

    <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
    
<body>
  <!-- menu bar-->  
  <?php
        include "../navbar.php";
  ?>

<div class="main-content">
<!--welcome message-->
    <div class="container-md paddingblock">
    <br/><br/>
    <div class="title">
        Successfully logged out.
    </div>

</div>

<br/>

<!--form for user to input their data-->
<form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" class="container-md" >

  <br/>


  <!--button to log in-->
  <button type="submit" name="logIn" class="btn btn-dark btn-block">Log In</button> 
</form>

<br/><br/>

</div>

  <!--FOOTER-->
  <?php
    include "../footer.php";
  ?>

</body>
</html>
<?php
} else 
{
    header("Location:logIn.php"); 
}
?>

