<?php
require('top.inc.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}

$cart_total = 0;
$errMsg = "";
if (isset($_POST['submit'])) {
    $address = get_safe_value($conn, $_POST['address']);
    $city = get_safe_value($conn, $_POST['city']);
    $pincode = get_safe_value($conn, $_POST['pincode']);
    $payment_type = get_safe_value($conn, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];
    $username = $_SESSION['USER_NAME'];
    // $_SESSION['USER_NAME'] = $row['username'];
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($conn, '', '', $key);
        $price = $productArr[0]['price'];

        $qty = $val['qty'];
        $cart_total = $cart_total + ($price * $qty);
    }
    $total_price = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
        unset($_SESSION['cart']);
    }
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');

    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    if (isset($_SESSION['COUPON_ID'])) {
        $coupon_id = $_SESSION['COUPON_ID'];
        $coupon_code = $_SESSION['COUPON_CODE'];
        $coupon_value = $_SESSION['COUPON_VALUE'];
        $total_price = $total_price - $coupon_value;
        unset($_SESSION['COUPON_ID']);
        unset($_SESSION['COUPON_CODE']);
        unset($_SESSION['COUPON_VALUE']);
    } else {
        $coupon_id = '';
        $coupon_code = '';
        $coupon_value = '';
    }

    mysqli_query($conn, "INSERT into `order`(user_id,username,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$user_id',' $username','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");

    $order_id = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($conn, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];

        $uid = $_SESSION['USER_ID'];
        mysqli_query($conn, "INSERT into `order_detail`(order_id,user_id,product_id,qty,price) values('$order_id','$uid','$key','$qty','$price')");
    }
    unset($_SESSION['cart']);

    if ($payment_type == 'instamojo') {
        $userArr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM regi where id='$user_id'"));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:test_0c1b1866832591cb3bab8476589",
                "X-Auth-Token:test_c7d7c7bfd47907958cbcc7a9dd8"
            )
        );
        $payload = array(
            'purpose' => 'Buy Product',
            'amount' => $total_price,
            'phone' => $userArr['phone'],
            'buyer_name' => $userArr['username'],
            'redirect_url' => 'http://localhost/admin/payment_complete.php',
            'send_email' => true,
            'send_sms' => true,
            'email' => $userArr['email'],
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        //prx($response);
        if (isset($response->payment_request->id)) {
            unset($_SESSION['cart']);
            $_SESSION['TID'] = $response->payment_request->id;
            mysqli_query($conn, "UPDATE `order` set txnid='" . $response->payment_request->id . "'WHERE id='" . $order_id . "'");
    ?>
            <script>
                window.location.href = '<?php echo $response->payment_request->longurl ?>'
            </script>
        <?php
        } else {
            if (isset($response->message)) {
                $errMsg .= "<div class='instamojo_error'>";
                foreach ($response->message as $key => $val) {
                    $errMsg .= strtoupper($key) . ':' . $val[0] . '</br>';
                }
                $errMsg .= "</div>";
            } else {
                echo "Something Went Wrong";
            }
        }
        ?>
        <script>
            window.location.href = '<?php echo $response->payment_request->longurl ?>'
        </script>
    <?php
    } else {
        sentInvoice($conn, $order_id);

    ?>
        <script>
            window.location.href = 'thank_you.php';
        </script>
<?php
    }
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 69, 690, 900) url(images/7.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php echo $errMsg ?>
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $accordion_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordion_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    Please Login To Continue <a style="color:red;" href="../Computer_world/Login.php">Click Here</a>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?php echo $accordion_class ?>">
                                Address Information
                            </div>
                            <form method="post">
                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="<?php echo $accordion_class ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            COD <input type="radio" name="payment_type" value="COD" required />
                                            &nbsp;&nbsp;Instamojo <input type="radio" name="payment_type" value="instamojo" required />
                                        </div>
                                        <div class="single-method">

                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="fv-btn" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productArr = get_product($conn, '', '', $key);
                            $pname = $productArr[0]['name'];
                            $mrp = $productArr[0]['mrp'];
                            $price = $productArr[0]['price'];
                            $image = $productArr[0]['image'];
                            $qty = $val['qty'];
                            $cart_total = $cart_total + ($price * $qty);
                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" />
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $pname ?></a>
                                    <span class="price"><?php echo $price * $qty ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart_del('<?php echo $key ?>','remove')"><i class="icon-trash icons"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="ordre-details__total" id="coupon_box">
                        <h5>Coupon Value</h5>
                        <span class="price" id="coupon_price"></span>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price" id="order_total_price"><?php echo $cart_total ?></span>
                    </div>
                    <div class="ordre-details__total bilinfo">
                        <input type="textbox" id="coupon_str" class="coupon_style mr5" /> <input type="button" name="submit" class="fv-btn coupon_style" value="Apply Coupon" onclick="set_coupon()" />

                    </div>
                    <div id="coupon_result"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function set_coupon() {
        var coupon_str = jQuery('#coupon_str').val();
        if (coupon_str != '') {
            jQuery('#coupon_result').html('');
            jQuery.ajax({
                url: 'set_coupon.php',
                type: 'post',
                data: 'coupon_str=' + coupon_str,
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    if (data.is_error == 'yes') {
                        jQuery('#coupon_box').hide();
                        jQuery('#coupon_result').html(data.dd);
                        jQuery('#order_total_price').html(data.result);
                    }
                    if (data.is_error == 'no') {
                        jQuery('#coupon_box').show();
                        jQuery('#coupon_price').html(data.dd);
                        jQuery('#order_total_price').html(data.result);
                    }
                }
            });
        }
    }
</script>
<?php
if (isset($_SESSION['COUPON_ID'])) {
    unset($_SESSION['COUPON_ID']);
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['COUPON_VALUE']);
}
require('footer.inc.php');
?>