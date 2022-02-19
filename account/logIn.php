<?php 
session_start();
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

        <link rel="stylesheet" type="text/css" href="../css/menuBar.css">
        <link rel="stylesheet" type="text/css" href="../css/signuppage.css">

        <!--bootstrap coming from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </head>
        <body>
        <header>
    <div class="storenamespace container-lg">
      <h1 class="brand">Amaziiin</h1> 
    </div>

    <!--navigation bar  -->
    <nav class="navbar navbar-expand-md navbar-dark"> 
      <!--Search bar-->  
      <div class="search-container">
        <form action="#">
          <input type="text" placeholder="Search..." name="search">
          <button type="submit" class="searchbtn btn-info  btn">Search</button>
        </form>
      </div>

      <div class=" navbar-collapse collapse" id="collapsibleNavbar">
        <!--item of nav bar (multiple section)-->
        <ul class="navbar-nav"> 
          <li class="nav-item">      
           <a class="link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="link" href="#">Sales</a>
          </li>
          <li class="nav-item">
            <a class="link" href="#">>Categories</a>
              <!--dropdown of the item using list method-->
              <ul>                              
                <li><a class="link" href="#" target="_self">Books</a></li>
                <li><a class="link" href="#" target="_self" >Clothes</a></li>
                <li><a class="link" href="#" target="_self">?</a></li>
                <li><a class="link" href="#" target="_self">?</a></li>
                <li><a class="link" href="#" target="_self" >?</a></li>
                <li><a class="link" href="#" target="_self">?</a></li>
              </ul>
          </li>
          <li>
          <a class="link" href="#">Order</a>
          </li>
          <li>
           <a class="link" href="signup.php">Sign up</a>
          </li>
          <li>
            <a class="link" href="logIn.php">Log in</a>
          </li>
        </ul>
      </div>
     
      <!--button for nav bar when collapsed -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
              style="background-color: rgb(54, 54, 54); color: white;">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </header>

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
        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
      </div>

      <br/>

      <!--LOG IN BTN-->
      <button type="submit" name="submitBtn" class="btn btn-dark btn-block" onclick=" return validateEmail()">Log In</button> 
    </form>

    <br/><br/>

    <div class="container-sm content">
      Do not have an account yet? Sign up now! <br/>
      <!--DIRECT TO SIGNUP.PHP-->
      <a href="signup.php" style="color: rgb(108, 155, 172)" target="_self">Create an account</a>
    </div>
 
  </div>

  <!--FOOTER-->
  <footer class="footer">    
    <p>&copy; All Right Reserved</p>
    <p>Have questions about our products? 
      <a href="#" style="color:#E1E5F2">Contact us</a> </p>
  </footer>

  <!--JS-->
  <script type="text/javascript" src="../js/logIn.js"></script>

    </body>
    </html>
<?php
}
else    // IF LOG IN BTN CLICKED
{
  
    if(!empty($_POST["email"]) && !empty($_POST["pwd"]))   // FORM FILLED
    {
        $found = false; 
        $userEmail = $_POST["email"];
        $password = $_POST["pwd"];

        $file = fopen("#", "r");     //  OPEN USER LIST

        if($file) 
        { 
            while (($line = fgets($file)) !== false) // returns a line from the file
            {
                $array = explode(":", $line);   // ":" separate the arrays
                if(($array[2] == $userEmail))    //   the second on the line is the userEmail
                {  
                    
                    if(trim($array[3]) === $password)   // THIRD : PWD
                    {
                        $found = true;
                        $userName = $array[1];    // assign $userName to the first one in the line
                        fclose($file);
                        $_SESSION['id'] = $array[0];
                        $_SESSION['username'] = $userName;
                        $_SESSION['email'] = $array[2];
                        $_SESSION['pass'] = $array[3];
                        $_SESSION['firstname']= $array[4];
                        $_SESSION['lastname']= $array[5];
                        $_SESSION['str'] = $array[6];
                        $_SESSION['apt'] = $array[7];
                        $_SESSION['postal'] = $array[8];
                        $_SESSION['city'] = $array[9];
                        $_SESSION['phone']= $array[10];
                        $_SESSION['order'] = $array[11];
                        header("Location:#");
                    }
                    else
                    {
                      //  ENTERED INCORRECT PWD

                      if(trim($array[3]) != $password) {
                      echo "<script>window.alert('Incorrect email or password, Please try again.');
                      window.history.back();</script>";
                      fclose($file);
                      exit();}
                    }

                }
            }
        }
        if (!$found)
        {   
            $file1 = fopen("#", "r");     // OPEN ADMIN USERS FILE
            if($file1) 
            {
                while (($line = fgets($file1)) !== false)
                {
                    $array = explode(":", $line);
                    if($array[0] == $userEmail)
                    {
                        
                        if(trim($array[1]) === $password)
                        {
                            $found = true;
                            fclose($file1);
                            $_SESSION['username'] = $userName;
                            header("Location:#");    // ADMIN CASE : DIRECT TO BACKSTORE
                        }
                        else
                        {
                          //  ENTERED INCORRECT PWD
    
                          if(trim($array[3]) != $password) {
                          echo "<script>window.alert('Incorrect email or password, Please try again.');
                          window.history.back();</script>";
                          fclose($file);
                          exit();}
                        }
                    }
               }   
            }
        } 
        if(!$found)
        {
          fclose($file);
          fclose($file1); 
          header("Location:#");     // USER DOES NOT EXIST
        }
        
        
    }
}
}
else {   // DIRECT USER TO THEIR PROFILE PAGE

    header("Location:#");
    exit();
}

?>
