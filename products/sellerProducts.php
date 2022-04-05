<?php
session_start();
$id = isset($_SESSION['code']) ? $_SESSION['code'] : '';
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");$query="SELECT * FROM PublicHealthWorker where id='$id'";
$query = "select * from products where id = '$id'";
$result=mysqli_query($db,$query);
if(isset($_POST['Delete'])) {

    if ($result->num_rows == 0) {
        echo "<script>
            alert('This product does not exist in the system $id ');
            window.location.href='sellerMyProducts.php';
            </script>";
    } else {
        $deletedquery = "DELETE FROM products where id='$id'";
        mysqli_query($db, $deletedquery);

        echo "<script>
            alert('product has been deleted form the System');
            window.location.href='sellerMyProducts.php';
            </script>";
    }
}
if(isset($_POST['Edit'])) {
    $_SESSION['id'] = $id;

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='sellerMyProducts.php';
            alert('This product does not exist in the system ');
            </script>";
    }else{
        echo "<script>

            window.location.href='editProduct.php';
            </script>";

    }
}
if(isset($_POST['Save'])) {
    $id = $_SESSION['code'];
    $name= $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $EditProductQuery= "UPDATE products 
                SET name = '$name', description='$description', price='$price',
                    quantity='$quantity'
                WHERE id='$id'";
    mysqli_query($db,$EditProductQuery);

    echo "<script>
          window.location.href='../index.php';
          alert('This product information has been updated successfully into the system');
          </script>";
}

