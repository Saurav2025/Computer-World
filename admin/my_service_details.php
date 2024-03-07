<?php
require('top.inc.php');
?>
<?php
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
$id = get_safe_value($conn, $_GET['id']);

?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/1.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Service Details</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Coustomer Name</th>
                                        <th class="product-thumbnail">Brand</th>
                                        <th class="product-name">Series</th>
                                        <th class="product-price">Address</th>
                                        <th class="product-price">Warranty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    //$res = mysqli_query($conn, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
                                    $res = mysqli_query($conn, "SELECT * from service where service.id='$id' and service.coustomer_id='$uid'");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $total_price = $row['Estimate'];
                                    ?>
                                        <tr>
                                            <td class="product-name"><?php echo $row['Name'] ?></td>
                                            <td class="product-name"><?php echo $row['Brand'] ?></td>
                                            <td class="product-name"><?php echo $row['Series'] ?></td>
                                            <td class="product-name"><?php echo $row['addr'] ?></td>
                                            <td class="product-name"><?php echo $row['Warranty'] ?></td>

                                        </tr>
                                    <?php }

                                    ?>


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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('footer.inc.php'); ?>