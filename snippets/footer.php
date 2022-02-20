<div class="foot">
    <ul>
        <li class="footer-head-list-item">Amazin</li>
        <br />
        <?php
          $aisles = ["jewelry", "tools", "electronics", "clothes"];
          foreach ($aisles as $aisle) {
                $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                echo '<li><a href="./product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
          }
        ?>
    </ul>
    <ul>
        <li class="footer-head-list-item">Account</li>
        <br />
        <li><a href="./account/logIn.php">Login</a></li>
        <li><a href="./account/signup.php">Create Account</a></li>
    </ul>
    <ul>
        <li class="footer-head-list-item">Contact Us</li>
        <br />
        <li><a href="">Call</a></li>
        <li><a href="/contact.php">Email</a></li>
    </ul>
</div>
