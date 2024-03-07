<?php
require('top.inc.php');
$id = get_safe_value($conn, $_GET['id']);

if (isset($_POST['update_order_status'])) {
    $update_order_status = $_POST['update_order_status'];

    $update_sql = '';
    if ($update_order_status == 3) {


        //$update_sql = ",length='$length',breadth='$breadth',height='$height',weight='$weight' ";
    }

    if ($update_order_status == '4') {
        mysqli_query($conn, "update service set service_status='$update_order_status' where id='$id'");
    } else {
        mysqli_query($conn, "update service set service_status='$update_order_status'  where id='$id'");
    }

    /* if ($update_order_status == 3) {
        $token = validShipRocketToken($conn);
        if ($token != '') {
            placeShipRocketOrder($conn, $token, $order_id);
        }
    }
    if ($update_order_status == 4) {
        $ship_order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ship_order_id from `order` where id='$order_id'"));
        if ($ship_order['ship_order_id'] > 0) {
            $token = validShipRocketToken($conn);
            cancelShipRocketOrder($token, $ship_order['ship_order_id']);
        }
    }*/
}
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Service Details </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Coustomer Name</th>
                                        <th class="product-thumbnail">Brand</th>
                                        <th class="product-name">Complaint</th>
                                        <th class="product-price">Adress</th>
                                        <th class="product-price">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($conn, "SELECT * from service where id='$id'");
                                    //$res = mysqli_query($conn, "SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $address = $row['addr'];
                                        $total_price = $row['Estimate'];
                                    ?>
                                        <tr>
                                            <td class="product-name"><?php echo $row['Name'] ?></td>
                                            <td class="product-name"><?php echo $row['Brand'] ?></td>
                                            <td class="product-name"><?php echo $row['comp'] ?></td>
                                            <td class="product-name"><?php echo $row['addr'] ?></td>
                                            <td class="product-name"><?php echo $row['Estimate'] ?></td>


                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-name">Total Service Charge</td>
                                        <td class="product-name">
                                            <?php
                                            echo $total_price;
                                            ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="address_details">
                                <strong>Order Status</strong>
                                <?php
                                $order_status_arr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT service_status.name from service_status,service where service.id='$id' and service.service_status=service_status.id"));
                                echo $order_status_arr['name'];
                                ?>
                            </div>
                            <div>
                                <form method="post">
                                    <select class="form-control" name="update_order_status" id="update_order_status" required onchange="select_status()">
                                        <option value="">Select Status</option>
                                        <?php
                                        $res = mysqli_query($conn, "select * from service_status");
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            if ($row['id'] == $categories_id) {
                                                echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                            } else {
                                                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function select_status() {
        var update_order_status = jQuery('#update_order_status').val();
        if (update_order_status == 3) {
            jQuery('#shipped_box').show();
        }
    }
</script>
<?php
require('footer.inc.php');
?>