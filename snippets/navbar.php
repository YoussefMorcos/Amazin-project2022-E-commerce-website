<?php
    session_start();
?>
<header>
    <div class="nav-wrapper">
        <nav>
            <div class="logo-wrapper">
                <p id="logo"><a href="/index.php">AMAZIN</a></p>
            </div>
            <div class="menu-wrapper">
                <ul class="menu">
                    <li class="menu-item"><a href="./product-landing.php">Shop</a>
                        <ul class="submenu">
                          <?php
                            $aisles = ["jewelry", "tools", "electronics", "clothes"];
                            foreach ($aisles as $aisle) {
                                  $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                                  echo '<li class="menu-item submenu-item"><a href="/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                            }
                          ?>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="./account/logIn.php">Account</a></li>
                    <li class="menu-item"><a href="./cart.php">Cart</a></li>
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
                          echo "<liv style=\"margin-right: 20px;\">Hello " . $_SESSION["username"] . "</li>";
                      }
                    ?>

                </ul>
            </div>
        </nav>
    </div>
</header>
