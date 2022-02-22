<?php
session_start();
if(!isset($_POST["login"]))        //  BTN NOT CLICKED
{
    ?>
    <!--echo "<h1> Welcome ".$_SESSION["email"]."<h1>";-->
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
        include "../snippets/navbar.php";
  ?>

  <!--Maint content-->
  <div class="main-content">
        <div class="container-md">
            <br/><br/>
            <div class="title">
                <?php echo "<h1> Successfully signed up!</h1>";?>
                <div class="content">
                    <?php echo "Thank you for joining us! <br/>
                    Please log in into your account before continuing.";?>
                </div>
            </div>
    </div>

    <br/><br/>


<br/>

<!--direct user to homepage-->
<form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" class="container-md" >

  <br/>


  <!--button to homepage-->
  <button type="submit" name="login" class="btn btn-dark btn-block">Click here to go to log in</button> 
</form>

<br/><br/>

</div>

  <!--FOOTER-->
  <?php
    include "../snippets/footer.php";
  ?>

<!--javascript at the bottom for it to load after receiving all the needed information-->
<script type="text/javascript" src="../Application/js/logIn.js"></script>

</body>
</html>
<?php
} else{ // BTN CLICKED

    header("Location:logIn.php");
}

?>

