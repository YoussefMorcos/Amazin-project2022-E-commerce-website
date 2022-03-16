<?php
session_start();



if(isset($_SESSION["username"]))    // USER LOGGED IN
{

if(!isset($_POST["logout"]) && !isset($_POST["edit"]))        // if button log out/edit is not clicked
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
    <link rel="stylesheet" type="text/css" href="../Application/css/logIn.css">

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
  <div class="container-md ">
    <br/><br/>
    <div class="title">
      <h1>Your Profile <br/><br/></h1>
    </div>
    <div class="title left">
    (Space for picture profile)<br/><br/>
        <?php echo "".$_SESSION["username"].""?>
    </div>
    <div class="content right">
      <?php
      $db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
      $username = $_SESSION['username'];
      $query="SELECT * FROM customers where username='$username'";
      $result=mysqli_query($db,$query);
      $row = $result->fetch_assoc();
      echo"
                   
                        <b>USERNAME</b> :".$row["username"]."<br/>
                        <b>EMAIL</b> :".$row["email"]."<br/><br/>

                        <b>ADDRESS</b> :<br/><br/>
                        ".$row["fname"]."
                        ".$row["lname"]."<br/>
                        ".$row["street"]."<br/>
                        Apt. Number : ".$row["apt"]."<br/>
                        ".$row["postalcode"]."<br/>
                        ".$row["city"]."<br/>
                        ".$row["phone"]."<br/><br/>
                        ";



      ?>

      <br style="clear:both;"/>
      <br/><br/><br/>
    </div>
  </div>

  <!--BTN EDIT-->
    <form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" class="container-sm" >
    <br/>
    <button type="submit" name="edit" class="btn btn-block btn-secondary">Edit</button> 
    </form>

  <br/><br/>

  <!--LOG OUT-->
  <form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" class="container-md" >
  <br/>
  <button type="submit" name="logout" class="btn btn btn-outline-dark">Log Out</button> 
  </form>



  <br/><br style="clear:both;"/>
</div>

  <!--FOOTER-->
  <?php
    include "../footer.php";
  ?>

<!--javascript at the bottom for it to load after receiving all the needed information-->
<script type="text/javascript" src="../js/logIn.js"></script>

</body>
</html>
<?php
} else
{ 

  if(isset($_POST['edit']))        // EDIT BTN CLICKED
  {
    header('Location:myAccountEdit.php');
  }
  else  // LOGGED OUT
  {
    unset($_SESSION['username']);
    header('Location:logOut.php');  //NEED LOGOUT.PHP
  }

    
}
} 
// NO SESSION - REDIRECT USER TO LOG IN
else { 

header('Location:logIn.php');
exit();

}
?>

