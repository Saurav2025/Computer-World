<?php
require('top.inc.php');

if (isset($_GET['id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['id']);
    //prx($product_id);
    if (isset($_POST['reviwe_submit'])) {
        $resultAll = mysqli_query($conn, "SELECT product_id from order_detail where order_id='$order_id'");
        if (!$resultAll) {
            die(mysqli_error($conn));
        }
        if (mysqli_num_rows($resultAll) > 0) {
            while ($product_id = mysqli_fetch_array($resultAll)) {
                $user=$product_id["product_id"];
                //prx($user);
            }
            $added_on = date('y-m-d h:m:s');
            $rating = get_safe_value($conn, $_POST['rating']);
            $review = get_safe_value($conn, $_POST['review']);
            $_SESSION['USER_ID'];
            mysqli_query($conn, "INSERT INTO product_review(product_id,user_id,rating,review,status,added_on) values('$user','" . $_SESSION['USER_ID'] . "','$rating','$review','1','$added_on')");
        }
    }
}

//$product_review_res = mysqli_query($conn, "SELECT regi.username,product_review.id,product_review.rating,product_review.review,product_review.added_on from regi,product_review where product_review.status=1 and product_review.user_id=regi.id and product_review.product_id='$product_id'order by product_review.added_on desc");
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/review1.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Thank You</span>
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
            <div class="col-md-12">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <div class="row" id="post-review-box">

                                <?php
                                if (isset($_SESSION['USER_LOGIN'])) {



                                ?>
                                    <div class="col-md-12">
                                        <form action="" method="post">
                                            <select class="form-control" name="rating" required>
                                                <option value="">Select Rating</option>
                                                <option>Worst</option>
                                                <option>Bad</option>
                                                <option>Good</option>
                                                <option>Very Good</option>
                                            </select>
                                            <div style="padding-top: 20px;padding-bottom:10px;">
                                                <textarea class="form-control" cols="50" id="new-review" name="review" placeholder="Enter Your Review here..." rows="5"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button style="color:blue;background: #26183b none repeat scroll 0 0;border: 1px solid #150e35;color: #fff;font-family: 'Poppins', sans-serif;font-size: 14px;font-weight: 600;height: 50px;padding: 0 30px;text-transform: uppercase;transition: all 0.4s ease 0s;" class="btn btn-sucess btn-lg" type="submit" name="reviwe_submit" required>Submit</button>
                                            </div>
                                        </form>

                                    </div>
                            </div>
                        <?php
                                } else {
                        ?>
                            <div style="color:red; padding-left: 20px;" class="danger">
                                Please Login To Give Feedback
                            </div>
                        <?php }

                        ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require('footer.inc.php');
?>