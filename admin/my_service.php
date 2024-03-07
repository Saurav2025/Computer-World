<?php
require('top.inc.php');
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/5.PNG) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Service</span>
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
                                        <th class="product-thumbnail">Service ID</th>
                                        <th class="product-name"><span class="nobr">Service Date</span></th>
                                        <th class="product-price"><span class="nobr"> Address </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Issue </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Brand </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Service Status </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];

                                    $res = mysqli_query($conn, "SELECT service.*,service_status.name as service_status_str from service,service_status where service.coustomer_id='$uid' and service_status.id=service.service_status");

                                    while ($row = mysqli_fetch_assoc($res)) {

                                        $service_status_checker = $row['service_status'];
                                        if ($service_status_checker == '3') {
                                    ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="my_service_details.php?id=<?php echo $row['id'] ?>"> <?php echo 'MY SERVICE' ?></a>
                                                    <br />

                                                    <a href="service_pdf.php?id=<?php echo $row['id'] ?>"> PDF</a>
                                                </td>
                                            <?php
                                        } else {
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="my_service_details.php?id=<?php echo $row['id'] ?>"> <?php echo 'MY SERVICE' ?></a>
                                                    <br />
                                                </td>
                                            <?php } ?>

                                            <td class="product-name"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name">
                                                <?php echo $row['addr'] ?><br />
                                            </td>
                                            <td class="product-name"><?php echo $row['Issues'] ?></td>
                                            <td class="product-name"><?php echo $row['Brand'] ?></td>
                                            <td class="product-name"><?php echo $row['service_status_str'] ?></td>

                                            </tr>
                                        <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>