<?php         
session_start();
        if (!isset($_POST["confirmBtn"]))   // CONFIRM BTN NOT CLICKED
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
        include "../snippets/navbar.php";
  ?>

    <!--content space-->
    <div class="row">

    <br/><br/>

        <div class="col-sm-9">
            <!--title of the main content-->
            <div class="width-expand container">
                <h6 class="title" style="font-size: 20pt;"><?php echo "".$_SESSION['username'].""?></h6>
            </div>
            <!--information the user entered and the changes they want to make-->
            <div class="container">
                <div class="form-group">
                    
                        <form action="<?php echo ($_SERVER["PHP_SELF"])?>" method="POST" id="userInfo" >

                            <label>New Username (if no change, please enter the same username)</label>
                            <input type="text" name="newUsername" class="form-control" id="newUsername" 
                            value="<?php echo "".$_SESSION['username'].""?>">

                            <br/>

                            Email address: <p style="display: inline;" id="email"><?php echo "".$_SESSION['email'].""?></p>
                            <p style="display: none;" id="newEmailDisplay"></p>
                            <br/>
                            <br/>
                
                            <label>New Email Address</label>
                            <input type="email" name="newemail" class="form-control" placeholder="Enter email" 
                            value="<?php echo "".$_SESSION['email'].""?>" id="newEmail">

                            <br/>

                            <label>Password :</label>
                            <p style="display: inline;"><?php echo "".$_SESSION['pass'].""?></p>
                            <br/>
                    
                            <label>New Password*</label>
                            <input type="password" name="newpass" class="form-control" placeholder="Enter password" 
                            value="<?php echo "".$_SESSION['pass'].""?>" id="newPwd">
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
                        <p id="fName" style="display: block;"><?php echo "".$_SESSION['firstname'].""?></p>
                        <p id="newFName" style="display:none;"></p>

                        <label><b>Last name</b></label>
                        <p id="lName" style="display: block;"><?php echo "".$_SESSION['lastname'].""?></p>
                        <p id="newLName" style="display: none;"></p>

                        <label><b>Street</b></label>
                        <p id="strtName" style="display: block;"><?php echo "".$_SESSION['str'].""?></p>
                        <p id="newStrtName" style="display: none;"></p>

                        <label><b>Apt.</b></label>
                        <p id="aptNum" style="display:block;"><?php echo "".$_SESSION['apt'].""?></p>
                        <p id="newAptNum" style="display: none;"></p>

                        <label><b>Postal Code</b></label>
                        <p id="postalCode" style="display: block;"><?php echo "".$_SESSION['postal'].""?></p>
                        <p id="newPostalCode" style="display: none;"></p>

                        <label><b>City</b></label>

                        <p id="postalCode" style="display: block;"><?php echo "".$_SESSION['city'].""?></p>
 

                        <label><b>Phone number</b></label>
                        <p id="tel" style="display: block;"><?php echo "".$_SESSION['phone'].""?></p>
                        <p id="newTel" style="display: none;"></p>
                    </div>
                </div>
            
                <!--new information to enter from user-->
                <div class="col col-sm-6">
                    <div class="form-group">

                    
                            <legend>New Address</legend>

                            <label>First name</label>
                            <input type="text" class="form-control" id="newFirstName" name="newfn"
                            value="<?php echo "".$_SESSION['firstname'].""?>">

                            <label>Last name</label>
                            <input type="text" class="form-control" id="newLastName" name="newln"
                            value="<?php echo "".$_SESSION['lastname'].""?>">

                            <label>Street</label>
                            <input type="text" class="form-control" id=newStreetName name="newstr" value="<?php echo "".$_SESSION['str'].""?>">

                            <label>Apt.</label>
                            <input type="text" class="form-control" id="newApt" name="newapt" value="<?php echo "".$_SESSION['apt'].""?>">

                            <label>Postal Code</label>
                            <input type="text" class="form-control" id="newPostCode" name="newpost" value="<?php echo "".$_SESSION['postal'].""?>">

                            <label>City</label>
                            <input type="text" class="form-control" id="newPostCode" name="newcity" value="<?php echo "".$_SESSION['city'].""?>">


                            <label>Phone number</label>
                            <input type="text" class="form-control" id="newTelNum" name="newphone" value="<?php echo "".$_SESSION['phone'].""?>">
                            <div class="width-expand">
                                <br/>
                                <button type="reset" class="btn btn-outline-danger btn-place"> Clear</button>
                                <button type="submit" name="confirmBtn" class="btn btn-outline-dark " onclick="validUser(); validAddress()" >Save</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php 
            }
                else // BTN CLICKED
                {
                    if(!empty($_POST["newUsername"]) && !empty($_POST["newemail"])
                    && !empty($_POST["newpass"]) && !empty($_POST["newfn"]) && !empty($_POST["newln"]) && !empty($_POST["newstr"])
                    && !empty($_POST["newapt"]) && !empty($_POST["newpost"]) && !empty($_POST["newcity"]) 
                    && !empty($_POST["newphone"]))  
                    {
                        // assigning variables
                         $found = false;

                        // NEW INPUTS

                         $newName = $_POST["newUsername"];
                         $newEmail = $_POST["newemail"];
                         $newPwd = $_POST["newpass"];
                         $newFName = $_POST["newfn"];
                         $newLName = $_POST["newln"];
                         $newStr = $_POST["newstr"];
                         $newApt = $_POST["newapt"];
                         $newPost = $_POST["newpost"];
                         $newCity = $_SESSION['city'];
                         $newPhone = $_POST["newphone"];
                         $newOrder = $_SESSION['order'];

                         // OLD INFO

                         $userId = $_SESSION['id'] ;
                         $userName = $_SESSION['username'];
                         $userEmail = $_SESSION['useremail'];
                         $userPwd = $_SESSION['pass'];
                         $userfn = $_SESSION['firstname'];
                         $userln = $_SESSION['lastname'];
                         $userstr = $_SESSION['str'] ;
                         $userapt = $_SESSION['apt'] ;
                         $userpost = $_SESSION['postal'];
                         $usercity = $_SESSION['city'];
                         $userphone = $_SESSION['phone'];
                         $userorder = $_SESSION['order'];

                         $userInfo ="$userId:$newName:$newEmail:$newPwd:$newFName:$newLName:$newStr:$newApt:$newPost:$newCity:$newPhone:$newOrder";

                         $file = fopen("userList.txt", "r");     // open userlist file to make sure no identical username and email

                        if($file) 
                        { 
                            while (($line = fgets($file)) !== false) // returns a line from the file
                            {
                                $array = explode(":", $line);   // ":" separate the arrays

                                if(trim($array[1]) === $userName )    //    FOUND USERNAME
                                {  
                                    
                                    $content = file_get_contents("userList.txt");    // read file as string
                                    $lineRemove = $line;        // line in text file to remove
                                    $newcontent = str_replace($lineRemove,$userInfo,$content);   // file with changes

                                    file_put_contents('userList.txt', $newcontent,); // rewrite the changed file 
                                    
                                    header("Location:modificationSuccess.php");
                                    
                                    $found=true;
                                    fclose($file);
                                    exit();
                                }
                            
 
                            }
                            //    UNFOUND FILE

                            if(!$found)    
                            {  

                                echo "<script>window.alert('Invalid input, try again. File not found or smth....');
                                window.history.back();</script>";
                                fclose($file);
                                exit();

                            } 

                        }
                    }

                    // NO INPUT 

                    if(empty($_POST["newUsername"]) || empty($_POST["newemail"])
                    || empty($_POST["newpass"]) || empty($_POST["newfn"]) || empty($_POST["newln"]) || empty($_POST["newstr"])
                    || empty($_POST["newapt"]) || empty($_POST["newpost"]) || empty($_POST["newcity"]) 
                    || empty($_POST["newphone"]))     
                    {
                        echo "<script>window.alert('Form not filled. No changes were made.');
                        window.history.back();</script>";
                        fclose($file);
                        exit();
                    }
                }
            ?>  

            
        </div>
    </div>

    </div>
    </div>
    <br/><br/>

    <!--FOOTER-->
  <?php
    include "../snippets/footer.php";
  ?>
        <!--javascript file-->
  <script type="text/javascript" src="../Application/js/userprofile.js"></script>

        </body>
        </html>

