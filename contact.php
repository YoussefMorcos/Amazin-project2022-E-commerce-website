<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Application/css/footer.css" />
    <link rel="stylesheet" href="Application/css/menu-bar.css" />
    <link rel="stylesheet" href="Application/css/index.css" />
    <link rel="stylesheet" type="text/css" href="../Application/css/logIn.css">
    <title>AMAZIN</title>

    <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
  <?php

    include "navbar.php";
  ?>     
  <div class="mainpage-img">
      <img src="assets/mainpageimage.jpg">
  </div>
  <div class="main-content">

      <div class="container-md">
      <h2 class="title">Have question about our services?</h2>
      <p style="width: 100%;" class="content">You can email us at: Amazin@example.com</p>
      <p style="width: 100%;" class="content">Or you can call for customer support: XXX-XXX-XXXX</p>
      </div>

      <div class="container-md">
      <h2 class="title">Want to return a product?</h2>
      <p style="width: 100%;" class="content">Please click 
      <a href="returnProcess.php">here</a></p>
      </div>
    </div>

    <br/>

    </body>
    </html>

 <?php
    include "footer.php";
  ?>

</body>
</html>
