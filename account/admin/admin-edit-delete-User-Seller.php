<?php

session_start();
$id = $_POST['id'];
$_SESSION['userid'] = $id;

$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");$query="SELECT * FROM PublicHealthWorker where id='$id'";
$query = "select * from customers where id = '$id'";
$result=mysqli_query($db,$query);

if(isset($_POST['Edit'])){


    if ($result->num_rows==0){
        echo "<script>
            window.location.href='../../index.php';
            alert('This user does not exist in the system ');
            </script>";
    }else{
        echo "<script>

            window.location.href='adminEditProfile.php';
            </script>";

    }

}
if(isset($_POST['Delete'])){


    if ($result->num_rows==0){
        echo "<script>
            window.location.href='../../index.php';
            alert('This user does not exist in the system ');
            </script>";
    }else{
        $deletedquery = "DELETE FROM customers where ID='$id'";
        mysqli_query($db, $deletedquery);

        echo "<script>
            alert('user deleted successfully');
            window.location.href='../../index.php';
            </script>";

    }

}