<?php
session_start();
$db= mysqli_connect("localhost", "root","321trewq", "amazin","3306") or die ("fail");
if (isset($_POST['Add']) and !empty($_FILES["file"]["name"])){
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $targetDir = "C:/Users/Youssef Morcos/PhpstormProjects/Amazin-soen341project2022/assets/".$_POST['category'];
    $fileName = basename($_FILES["file"]["name"]);

    $targetFilePath = $targetDir ;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $imgPath = 'assets/'.$_POST['category'].'/' . $fileName ;
    move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__.'/../../assets/'.$_POST['category'].'/'. $_FILES["file"]['name']);
    $description = $_POST['proddesc'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $query = "insert into products (name,category,description,price,quantity,imgPath,sellerID) values 
                                                                    ('$name','$category','$description','$price','$quantity','$imgPath','$id') ";
    mysqli_query($db,$query);
    echo "<script>
        window.location.href='../../index.php';
          alert('This item has been added successfully into the system ');
     
          </script>";
}