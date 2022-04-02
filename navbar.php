<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['username'])){
    ?>
    <header>
        <div class="nav-wrapper navbar">
            <nav >
                <div class="logo-wrapper">
                    <p id='logo'> <a href='../index.php'>AMAZIN</a></p>


                </div>
                <div class="menu-wrapper">
                    <ul class="menu">
                        <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){

                            echo' <li class="menu-item"><a href="product-landing.php"> Shop</a>';
                        }else echo ' <li class="menu-item"><a href="products/product-landing.php"> Shop</a>'

                        ?>

                        <ul class="submenu">
                            <?php
                            $aisles = ["jewelry", "tools", "electronics", "clothes"];
                            foreach ($aisles as $aisle) {
                                $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                                if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                    echo '<li class="submenu-item"><a href="product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                }else echo '<li class="submenu-item"><a href="products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                            }
                            ?>
                        </ul>
                        </li>
                        <?php
                        if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                            echo "<li class='menu-item'><a href='account/myAccount.php'>Account</a></li>";
                        }else{ echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";}?>
                        <?php if(isset($_SESSION['username'])){
                            echo " <li class='menu-item'><a href='account/cart.php'>Cart</a></li>";
                        }?>

                        <li class="menu-item"><a href="">Deals</a></li>
                        <?php
                        if(isset($_SESSION["admin"])) {
                            echo "<li class='menu-item'><a href=''>Admin</a>";
                            echo  "<ul class='submenu'>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                            echo "</ul>";
                            echo "</li>";
                            echo "<li class='hello'></li>";
                        }
                        if(isset($_SESSION["username"])) {
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li style=\"margin-right: 20px;\"><a href='account/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                echo " <a href='account/logout.php'>Click here to log out</a>";
                            }else{
                                echo "<li  style=\"margin-right: 20px;\"><a href='myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                echo " <a href='logout.php'> log out</a>";

                            }


                        }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                            echo "<a href='../account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";

                        }else  echo "<a href='account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";
                        ?>

                        <li><?php if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                echo '<form method="post" action="Search-Result.php">';
                            }else echo '<form method="post" action="products/Search-Result.php">';?>


                            <form method="post" action="products/Search-Result.php">
                                <?php $search = isset($_POST['search']) ? $_POST['search'] : ''; ?>

                                <input style="height: 30px;width: 300px;margin-left: 30px" type="text" name="search" placeholder="Search for a product" value=<?php echo $search;?>>

                            </form>


                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </header>
<?php }else if (isset($_SESSION['username'])){
    $db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
    $username = $_SESSION['username'];
    $query = "select type from customers where username ='$username'";
    $result = mysqli_query($db,$query);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $type = $row['type'];
    }


    if($type == "user"){                      ?>
        <header>
            <div class="nav-wrapper">
                <nav >
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../index.php'>AMAZIN</a></p>
                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){

                                echo' <li class="menu-item"><a href="product-landing.php"> Shop</a>';
                            }else echo ' <li class="menu-item"><a href="products/product-landing.php"> Shop</a>'

                            ?>

                            <ul class="submenu">
                                <?php
                                $aisles = ["jewelry", "tools", "electronics", "clothes"];
                                foreach ($aisles as $aisle) {
                                    $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                                    if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                        echo '<li class="submenu-item"><a href="product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                    }else echo '<li class="submenu-item"><a href="products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                }
                                ?>
                            </ul>
                            </li>
                            <?php
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li class='menu-item'><a href='account/myAccount.php'>Account</a></li>";
                            }else{ echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";}?>
                            <?php if(isset($_SESSION['username'])){
                                echo " <li class='menu-item'><a href='account/cart.php'>Cart</a></li>";
                            }?>

                            <li class="menu-item"><a href="">Deals</a></li>
                            <?php
                            if(isset($_SESSION["admin"])) {
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                    echo "<li style=\"margin-right: 20px;\"><a href='account/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='account/logout.php'>Click here to log out</a>";
                                }else{
                                    echo "<li  style=\"margin-right: 20px;\"><a href='myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='logout.php'> log out</a>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<a href='../account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";

                            }else  echo "<a href='account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";
                            ?>

                            <li><?php if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                    echo '<form method="post" action="Search-Result.php">';
                                }else echo '<form method="post" action="products/Search-Result.php">';?>


                                <form method="post" action="products/Search-Result.php">
                                    <?php $search = isset($_POST['search']) ? $_POST['search'] : ''; ?>

                                    <input style="height: 30px;width:
                                    300px;margin-left: 30px" type="text" name="search"
                                           placeholder="Search for a product" value=<?php echo $search;?>/>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    <?php }else if ($type == "seller"){?>

        <header>
            <div class="nav-wrapper">
                <nav >
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../index.php'>AMAZIN</a></p>


                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){

                                echo' <li class="menu-item"><a href="../products/sellerMyProducts.php"> My Products</a>';
                            }else echo ' <li class="menu-item"><a href="products/sellerMyProducts.php"> My Products</a>'

                            ?>


                            </li>
                            <?php
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li class='menu-item'><a href='account/myAccount.php'>Account</a></li>";
                            }else{ echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";}?>


                            <li class="menu-item"><a href="Sprint%203/postItem.php">Post an item</a></li>
                            <?php
                            if(isset($_SESSION["admin"])) {
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                    echo "<li style=\"margin-right: 20px;\"><a href='account/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='account/logout.php'>Click here to log out</a>";
                                }else{
                                    echo "<li  style=\"margin-right: 20px;\"><a href='myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='logout.php'> log out</a>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<a href='../account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";

                            }else  echo "<a href='account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

    <?php }else {?>
        <header>
            <div class="nav-wrapper">
                <nav>
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../index.php'>AMAZIN</a></p>
                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li class='menu-item'><a href='account/myAccount.php'>Account</a></li>";
                            }else{ echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";}?>
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){

                                echo' <li class="menu-item"><a href="product-landing.php"> Users</a>';
                            }else echo ' <li class="menu-item"><a href="products/product-landing.php"> Users</a>'

                            ?>


                            <?php if(isset($_SESSION['username'])){
                                echo " <li class='menu-item'><a href='account/cart.php'>Sellers</a></li>";
                            }
                            echo "<li class='menu-item'><a   href='Sprint%203/postItem.php' \"> Orders </a></li>";

                            ?>

                            <li class="menu-item"><a href="">Products</a></li>
                            <?php
                            if(isset($_SESSION["admin"])) {
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                    echo "<li style=\"margin-right: 20px;\"><a href='account/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='account/logout.php'>Click here to log out</a>";
                                }else{
                                    echo "<li  style=\"margin-right: 20px;\"><a href='myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <a href='logout.php'> log out</a>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<a href='../account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";

                            }else  echo "<a href='account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";
                            ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

    <?php }
}
?>



