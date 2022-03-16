<?php 

if(!isset($_SESSION["username"]))
{
if (!isset($_POST["submitBtn"]))
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
    <div class="container-md">
      <h2 class="title">Welcome back!</h2>
      <p class="content">Sign in to enjoy ton of perks!!!</p>
    </div>

    <br/>

    <!--FORM TO LOG IN-->
    <form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" class="container-md" 
     >

      <!--ENSURE PROPER MARGIN (BOOTSTRAP CLASS)-->
      <div class="form-group"> 
        <label>Email address</label>
        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" >
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
      </div>

      <br/>

      <!--LOG IN BTN-->
      <button type="submit" name="submitBtn" class="btn btn-dark btn-block" onclick=" return validateEmail()">Log In</button> 
    </form>

    <br/><br/>

    <div class="container-sm content">
      Do not have an account yet? Sign up now! <br/>
      <!--DIRECT TO SIGNUP.PHP-->
      <a href="../Sprint%201/signup.php" style="color: rgb(108, 155, 172)" target="_self">Create an account</a>
    </div>
 
  </div>

  <br/><br/>

  <!--FOOTER-->
  <?php
    include "../footer.php";
  ?>

    </body>
    </html>
<?php
}
else    // IF LOG IN BTN CLICKED
{
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $_SESSION['email'] = $email;
    $db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
    $query = "SELECT email , password FROM customers where email='$email'";
    $result = mysqli_query($db, $query);
    $row = $result->fetch_assoc();
    $enteredPassword = $_POST['password'];
    if ($enteredPassword == $row['password']) {
        session_start();
        $query = "SELECT username  FROM customers where email='$email'";
        $result = mysqli_query($db, $query);
        $row = $result->fetch_assoc();
        $user = $row['username'];
        $_SESSION['username'] = $user;

        echo "<script>
            window.location.href='../index.php';
            </script>";
    }
}
}
