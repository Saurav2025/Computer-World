<?php
require('top.inc.php');
$heading1 = '';
$heading2 = '';
$btn_text = '';
$btn_link = '';
$image = '';
$order_no = 0;
$msg = "";
$image_required = 'required';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn, $_GET['id']);
    $image_required = '';
    $res = mysqli_query($conn, "SELECT * from banner where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $heading1 = $row['heading1'];
        $heading2 = $row['heading2'];
        $btn_text = $row['btn_text'];
        $btn_link = $row['btn_link'];
        $image = $row['image'];
        $order_no = $row['order_no'];
    } else {
        header('location:banner.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $heading1 = get_safe_value($conn, $_POST['heading1']);
    $heading2 = get_safe_value($conn, $_POST['heading2']);
    $btn_text = get_safe_value($conn, $_POST['btn_text']);
    $btn_link = get_safe_value($conn, $_POST['btn_link']);
    $order_no = get_safe_value($conn, $_POST['order_no']);


    if (isset($_GET['id']) && $_GET['id'] != '') {
        if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
            $msg = "Please select only png,jpg and jpeg image formate";
        }
    } else {
        if ($_FILES['image']['type'] != '') {
            if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
                $msg = "Please select only png,jpg and jpeg image formate";
            }
        }
    }

    $msg = "";
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], BANNER_IMAGE_SERVER_PATH . $image);
                mysqli_query($conn, "UPDATE banner set heading1='$heading1',heading2='$heading2',btn_text='$btn_text',btn_link='$btn_link',image='$image',order_no='$order_no' where id='$id'");
            } else {
                mysqli_query($conn, "UPDATE banner set heading1='$heading1',heading2='$heading2',btn_text='$btn_text',btn_link='$btn_link',order_no='$order_no' where id='$id'");
            }
        } else {
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], BANNER_IMAGE_SERVER_PATH . $image);
            mysqli_query($conn, "INSERT into banner(heading1,heading2,btn_text,btn_link,image,order_no,status) values('$heading1','$heading2','$btn_text','$btn_link','$image','$order_no','1')");
        }
        header('location:banner.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Banner</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="heading1" class=" form-control-label">Heading-1</label>
                                <input type="text" name="heading1" placeholder="Enter Heading-1" class="form-control" required value="<?php echo $heading1 ?>">
                            </div>
                            <div class="form-group">
                                <label for="heading2" class=" form-control-label">Heading-2</label>
                                <input type="text" name="heading2" placeholder="Enter Heading-2" class="form-control" required value="<?php echo $heading2 ?>">
                            </div>
                            <div class="form-group">
                                <label for="btn_text" class=" form-control-label">Button Text</label>
                                <input type="text" name="btn_text" placeholder="Enter Button Text" class="form-control" value="<?php echo $btn_text ?>">
                            </div>
                            <div class="form-group">
                                <label for="btn_link" class=" form-control-label">Button Link</label>
                                <input type="text" name="btn_link" placeholder="Enter Button Link" class="form-control" value="<?php echo $btn_link ?>">
                            </div>
                            <div class="form-group">
                                <label for="btn_link" class=" form-control-label">Banner Image</label>
                                <input type="file" name="image" class="form-control" <?php echo $image_required ?> value="<?php echo $image ?>">
                                <?php
                                if ($image != '') {
                                    echo "<a target='_blank' href='" . BANNER_IMAGE_SITE_PATH . $image . "'><img width='150px' src='" . BANNER_IMAGE_SITE_PATH . $image . "'/></a>";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="order_no" class=" form-control-label">Order Number</label>
                                <input type="text" name="order_no" placeholder="Enter Order Number" class="form-control" value="<?php echo $order_no ?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?>
                            </div>
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