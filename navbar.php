<?php
if(!isset($_SESSION))
{
    session_start();
}

?>
<header>
    <div class="nav-wrapper">
        <nav>
            <div class="logo-wrapper">
                <?php if(str_contains($_SERVER['REQUEST_URI'],"/Amazin-soen341project2022/index.php")  ){
                    echo " <p id='logo'><a href='index.php'>AMAZIN</a></p>";
                }else{echo " <p id='logo'> <a href='../index.php'>AMAZIN</a></p>";}
                ?>

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

                      }else echo "<a href='account/logIn.php'  style=\"margin-right: 20px;\"> Login </a>";
                    ?>
                    <li><?php if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                    echo '<form method="post" action="Search-Result.php">';
                                }else echo '<form method="post" action="products/Search-Result.php">';?>
                        <form method="post" action="products/Search-Result.php">
                            <?php $search = isset($_POST['search']) ? $_POST['search'] : ''; ?>

                            <input style="height: 30px;width: 300px;margin-left: 100px" type="text" name="search" placeholder="Search for a product" value=<?php echo $search;?>>

                        </form>

                    </li>


                </ul>
            </div>
        </nav>
    </div>
</header>
