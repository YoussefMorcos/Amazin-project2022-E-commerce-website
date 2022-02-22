<?php 
    ?>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazin</title>

    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/index.css" />
    <link rel="stylesheet" type="text/css" href="../Application/css/logIn.css">

    <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
    
<body>
  <!-- menu bar-->  
  <?php
        include "../snippets/navbar.php";
  ?>
    
    <!--content space-->
    <div class=" main-content">

        <!--main-content-->
        <div class="main-content">
            <div class="width-expand container">
                <!--title of main content-->
                <br/>
                <h4 class="title container" style="text-align:center;" >Profile has been updated</h4>
                <br/>
                
            </div>

            <!--information the user entered and the changes they want to make-->
            <div class="container">

                <!--user's username-->
                <h5 class="container" style="text-align:center;" id="username" style="display: block;">
                Please click <a href="myAccount.php">here</a> to return to Your Profile.</h5>

                
            </div>
    </div>

    <!--FOOTER-->
    <?php
    include "../snippets/footer.php";
  ?>
 
  </body>
</html>