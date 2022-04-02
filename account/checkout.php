<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/checkout.css" />

    <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>AMAZIN</title>
</head>

<body>
    <!-- menu bar-->
    <?php
    include "../navbar.php";
    ?>

    <!--MAIN CONTENT-->
    <div class="main-content">

        <div class="title">
            Checkout
        </div>

        <div class="content">
            Please confirm your address and payment method
            <br /><br />

            <!-- PUT TOTAL PRICE HERE -->

            <div class="title">
                Total: $INPUT PRICE HERE
            </div>

            <div class="address">
                <b>Shipping Address</b>
                <br /><br />

                <!-- PUT USER ADDRESS HERE-->

                First name:
                <br />
                Last name:
                <br />
                Street:
                <br />
                Apt:
                <br />
                Postal code:
                <br />
                City:
                <br />
                Phone number:
                <br />
                <br />
                <div style="float:right;">
                    <input type="checkbox" name="confirm1" id="confirmation1">
                    <label>Confirmation</label>
                </div>
            </div>

            <!--PAYMENT METHOD OF USER-->

            <div class="payment">
                <b>Payment Method</b>
                <br /><br />

                <label>Card Number</label> <br />
                <input type="text" style="width:15%;" name=cardnumber id="cardnumber">
                <br />

                <label>Expiry Date</label> <br />
                <input type="text" style="width:8%;" name=expirymonth placeholder="Month" id="expiryMonth">
                <input type="text" style="width:8%;" name=expiryyear placeholder="Year" id="expiryYear">
                <br />

                <label>Security Code</label> <br />
                <input type="text" style="width:10%;" name=securitycode placeholder="Security Code" id="securitycode">
                <br />

                <div style="float:right;">
                    <input type="checkbox" name="confirm2" id="confirmation2">
                    <label>Confirmation</label>
                </div>

            </div>
            <br />
            <br />
            <br />

            <!--BUTTON TO CONFIRM PURCHASE OR CANCEL-->
            <div class="content">
                <button type="submit" name="paybtn" onclick="return onClick()" class="btn-style">Click here to pay now</button>
                &emsp;
                <script>
                    function onClick() {
                        var confirmation1 = document.getElementById("confirmation1").checked;
                        if (!(confirmation1)) {
                            alert("You must confirm your shipping address before proceeding.");
                            return false;
                        } else {
                            var confirmation2 = document.getElementById("confirmation2").checked;
                            if (!(confirmation2)) {
                                alert("You must confirm your payment method before proceeding.");
                                return false;
                            } else {
                                document.location.href = "checkout-2.php";
                                return true;
                            }

                        }
                    };
                </script>

                <button type="submit" name="cancel" onclick="return cancel()" class="cancelbtn">Cancel</button>
                <script>
                    function cancel() {
                        let text = "Press OK to cancel your purchase.";
                        if (confirm(text) == true) {
                            document.location.href = "checkout-cancel.php";
                        }
                    };
                </script>
            </div>


        </div>
        <?php
        include "../footer.php";
        ?>

</body>

</html>