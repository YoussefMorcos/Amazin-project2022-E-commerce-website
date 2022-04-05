<?php

session_start();
        if (!isset($_POST["edit"]))   // CONFIRM BTN NOT CLICKED
        {
     ?>

<html lang="en">
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
  $db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
  $id = $_SESSION['userid'];

  $query="SELECT * FROM customers where ID='$id'";
  $result=mysqli_query($db,$query);
  $row = $result->fetch_assoc();
  $_SESSION['email'] = $row['email'];
  $id = $row['ID'];
  $username = $row['username'];
  $email = $row['email'];
  ?>

    <!--content space-->
    <div class="row">

    <br/><br/>

        <div class="col-sm-9">
            <!--title of the main content-->
            <div class="width-expand container">
                <h6 class="title" style="font-size: 20pt;"><?php echo "".$row['username'].""?></h6>
            </div>
            <!--information the user entered and the changes they want to make-->
            <div class="container">
                <div class="form-group">

                        <form action="adminUserChange.php" method="POST" id="userInfo" >

                            <label>New Username (if no change, please enter the same username)</label>
                            <?php echo" <input name='username' type='hidden' value= $username>";?>
                            <input type="text" name="newUsername" class="form-control" id="newUsername"
                            value="<?php echo "".$row['username'].""?>">

                            <br/>
                            <?php echo" <input name='email' type='hidden' value= $email>";?>
                            Email address: <p style="display: inline;" id="email" name = "email"><?php echo "".$row['email'].""?></p>
                            <p style="display: none;" id="newEmailDisplay"></p>
                            <br/>
                            <br/>

                            <label>New Email Address</label>
                            <input type="email" name="newemail" class="form-control" placeholder="Enter email"
                            value="<?php echo "".$row['email'].""?>" id="newEmail">

                            <br/>

                            <label>Password :</label>
                            <p style="display: inline;"><?php echo "".$row['password'].""?></p>
                            <br/>

                            <label>New Password*</label>
                            <input type="password" name="newpass" class="form-control" placeholder="Enter password"
                            value="<?php echo "".$row['password'].""?>" id="newPwd">
                            <p>*Minimum password requirements: at least 8 characters, 1 uppercase, and 1 number</p>
                            <br/>
                </div>
            </div>

            <!--user address-->
            <div class="row container">
               <div class="col col-sm-6">
                    <div class="form-group">

                        <!--information previously entered by user-->
                        <legend>Address</legend>

                        <label><b>First name</b></label>
                        <p id="fName" style="display: block;"><?php echo "".$row['fname'].""?></p>
                        <p id="newFName" style="display:none;"></p>

                        <label><b>Last name</b></label>
                        <p id="lName" style="display: block;"><?php echo "".$row['lname'].""?></p>
                        <p id="newLName" style="display: none;"></p>

                        <label><b>Street</b></label>
                        <p id="strtName" style="display: block;"><?php echo "".$row['street'].""?></p>
                        <p id="newStrtName" style="display: none;"></p>

                        <label><b>Apt.</b></label>
                        <p id="aptNum" style="display:block;"><?php echo "".$row['apt'].""?></p>
                        <p id="newAptNum" style="display: none;"></p>

                        <label><b>Postal Code</b></label>
                        <p id="postalCode" style="display: block;"><?php echo "".$row['postalcode'].""?></p>
                        <p id="newPostalCode" style="display: none;"></p>

                        <label><b>City</b></label>

                        <p id="postalCode" style="display: block;"><?php echo "".$row['city'].""?></p>


                        <label><b>Phone number</b></label>
                        <p id="tel" style="display: block;"><?php echo "".$row['phone'].""?></p>
                        <p id="newTel" style="display: none;"></p>
                    </div>
                </div>

                <!--new information to enter from user-->
                <div class="col col-sm-6">
                    <div class="form-group">


                            <legend>New Address</legend>

                            <label>First name</label>
                            <input type="text" class="form-control" id="newFirstName" name="newfn"
                            value="<?php echo "".$row['fname'].""?>">

                            <label>Last name</label>
                            <input type="text" class="form-control" id="newLastName" name="newln"
                            value="<?php echo "".$row['lname'].""?>">

                            <label>Street</label>
                            <input type="text" class="form-control" id=newStreetName name="newstr" value="<?php echo "".$row['street'].""?>">

                            <label>Apt.</label>
                            <input type="text" class="form-control" id="newApt" name="newapt" value="<?php echo "".$row['apt'].""?>">

                            <label>Postal Code</label>
                            <input type="text" class="form-control" id="newPostCode" name="newpost" value="<?php echo "".$row['postalcode'].""?>">

                            <label>City</label>
                            <input type="text" class="form-control" id="newPostCode" name="newcity" value="<?php echo "".$row['city'].""?>">


                            <label>Phone number</label>
                            <input type="text" class="form-control" id="newTelNum" name="newphone" value="<?php echo "".$row['phone'].""?>">
                            <div class="width-expand">
                                <br/>
                                <button type="reset" class="btn btn-outline-danger btn-place"> Clear</button>
                                <button type="submit" name="confirmBtn" class="btn btn-outline-dark " onclick="validUser(); validAddress()" >Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>


    </div>
    </div>
    <br/><br/>

    <!--FOOTER-->
  <?php
  }
    include "../footer.php";
  ?>
        <!--javascript file-->
  <script type="text/javascript" src="../Application/js/userprofile.js"></script>

        </body>
        </html>


